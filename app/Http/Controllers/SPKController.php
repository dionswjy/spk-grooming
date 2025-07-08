<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SPKResult;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SPKController extends Controller
{
    public function index()
    {
        $places = [
            [
                'name' => 'Grooming Ceria',
                'distance' => 2.5,
                'price' => 85000,
                'rating' => 4.7,
                'facilities' => 2.1,
                'queue' => 4.2
            ],
            // ... data lainnya tetap sama
        ];

        return view('spk.index', compact('places'));
    }

    public function process(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'kriteria' => 'required|array',
                'kriteria.*.label' => 'required|string',
                'kriteria.*.bobot' => 'required|numeric|min:0|max:1',
                'alternatif' => 'required|array',
                'alternatif.*.name' => 'required|string',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $kriteria = $request->input('kriteria');
            $alternatif = $request->input('alternatif');

            // Hitung dan validasi total bobot
            $totalBobot = array_sum(array_column($kriteria, 'bobot'));
            if (abs($totalBobot - 1.0) > 0.001) { // Menggunakan toleransi floating point
                throw new \Exception('Total bobot harus 1.00 (current: '.$totalBobot.')');
            }

            $result = $this->calculateSPK($kriteria, $alternatif);

            // Simpan ke database dengan transaction
            \DB::transaction(function () use ($result) {
                SPKResult::updateOrCreate(
                    ['user_id' => Auth::id()],
                    ['result' => json_encode($result)]
                );
            });

            return view('spk.result', [
                'results' => $result,
                'kriteria' => $kriteria
            ]);

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Memisahkan logika perhitungan SPK
     */
    protected function calculateSPK(array $kriteria, array $alternatif): array
    {
        // Identifikasi kriteria cost/benefit
        $costCriteria = $this->identifyCostCriteria($kriteria);

        // Hitung nilai max/min per kriteria
        $stats = $this->calculateCriteriaStats($kriteria, $alternatif, $costCriteria);

        $results = [];
        foreach ($alternatif as $alt) {
            $score = 0;
            $details = [];

            foreach ($kriteria as $key => $k) {
                $value = (float)($alt[$key] ?? 0);
                $normalized = $this->normalizeValue(
                    $value,
                    $stats[$key]['max'],
                    $stats[$key]['min'],
                    $costCriteria[$key]
                );
                
                $weighted = $normalized * $k['bobot'];
                $score += $weighted;
                
                $details[$key] = [
                    'value' => $value,
                    'normalized' => $normalized,
                    'weighted' => $weighted
                ];
            }

            $results[] = [
                'name' => $alt['name'],
                'score' => round($score, 4),
                'details' => $details
            ];
        }

        // Urutkan dari score tertinggi
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        return $results;
    }

    /**
     * Identifikasi kriteria cost/benefit
     */
    protected function identifyCostCriteria(array $kriteria): array
    {
        $costKeys = ['distance', 'price', 'queue']; // Key yang pasti cost
        $costLabels = ['jarak', 'harga', 'biaya']; // Label yang mengindikasikan cost

        $result = [];
        foreach ($kriteria as $key => $k) {
            // Cek berdasarkan key
            if (in_array($key, $costKeys)) {
                $result[$key] = true;
                continue;
            }

            // Cek berdasarkan label
            $lowerLabel = strtolower($k['label']);
            foreach ($costLabels as $costLabel) {
                if (strpos($lowerLabel, $costLabel) !== false) {
                    $result[$key] = true;
                    continue 2;
                }
            }

            // Default benefit
            $result[$key] = false;
        }

        return $result;
    }

    /**
     * Hitung statistik kriteria
     */
    protected function calculateCriteriaStats(array $kriteria, array $alternatif, array $costCriteria): array
    {
        $stats = [];
        foreach ($kriteria as $key => $k) {
            $values = array_column($alternatif, $key);
            $values = array_filter($values, 'is_numeric');
            
            if (empty($values)) {
                throw new \Exception("Tidak ada nilai valid untuk kriteria {$k['label']}");
            }

            $stats[$key] = [
                'max' => max($values),
                'min' => min($values),
                'is_cost' => $costCriteria[$key]
            ];
        }
        return $stats;
    }

    /**
     * Normalisasi nilai
     */
    protected function normalizeValue(float $value, float $max, float $min, bool $isCost): float
    {
        // Handle kasus semua nilai sama
        if ($max == $min) {
            return 1.0;
        }

        return $isCost 
            ? $min / max($value, 0.0001) // Hindari pembagian nol
            : $value / $max;
    }
}