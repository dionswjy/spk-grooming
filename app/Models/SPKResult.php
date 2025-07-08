<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SPKResult extends Model
{
    protected $table = 'spk_results';
    
    protected $fillable = [
        'user_id', 
        'result',
        'criteria_data', // Tambahkan field baru untuk menyimpan data kriteria
        'alternatives_data' // Tambahkan field untuk menyimpan data alternatif
    ];
    
    protected $casts = [
        'result' => 'array',
        'criteria_data' => 'array',
        'alternatives_data' => 'array'
    ];
    
    /**
     * Relasi dengan user
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Accessor untuk result yang diformat
     */
    protected function formattedResult(): Attribute
    {
        return Attribute::make(
            get: function () {
                $result = $this->result ?? [];
                
                // Format hasil untuk tampilan yang lebih baik
                return array_map(function($item) {
                    return [
                        'name' => $item['name'] ?? 'Unknown',
                        'score' => number_format($item['score'] ?? 0, 4),
                        'details' => $item['details'] ?? []
                    ];
                }, $result);
            }
        );
    }
    
    /**
     * Scope untuk hasil terbaru
     */
    public function scopeLatestResults($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    
    /**
     * Scope untuk hasil user tertentu
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}