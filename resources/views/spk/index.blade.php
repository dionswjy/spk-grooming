<!DOCTYPE html>
<html>
<head>
    <title>SPK Tempat Grooming Hewan Peliharaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #e0e7ff;
            --secondary: #3f37c9;
            --danger: #ef233c;
            --danger-light: #fdecea;
            --success: #4cc9f0;
            --text: #2b2d42;
            --text-light: #8d99ae;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --border: #e9ecef;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #4361ee, #4cc9f0);
        }
        
        h1 {
            color: var(--text);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 2.2rem;
        }
        
        h2 {
            color: var(--text);
            margin: 30px 0 20px;
            font-weight: 500;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        h2 i {
            color: var(--primary);
        }
        
        .section {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid var(--border);
        }
        
        .criteria-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .criteria-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 15px;
            background-color: var(--primary-light);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .criteria-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.1);
        }
        
        .criteria-input {
            flex: 1;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            outline: none;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-light);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #d90429;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
        }
        
        .btn-icon {
            padding: 8px;
            border-radius: 50%;
            min-width: 36px;
            justify-content: center;
        }
        
        .total-weight {
            margin-top: 15px;
            padding: 12px 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
        }
        
        .total-weight span {
            font-weight: 600;
            color: var(--primary);
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px 0;
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 0 1px var(--border);
        }
        
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }
        
        th {
            background-color: var(--primary);
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .aksi-column {
            position: sticky;
            right: 0;
            background: var(--primary);
            z-index: 2;
            width: 120px;
            text-align: center;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: var(--primary-light);
        }
        
        .table-input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background-color: white;
        }
        
        .table-input:focus {
            border-color: var(--primary);
            outline: none;
        }
        
        .action-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }
        
        .error-message {
            background-color: var(--danger-light);
            color: var(--danger);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 4px solid var(--danger);
        }
        
        .error-message i {
            font-size: 1.2rem;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }
            
            .criteria-container {
                grid-template-columns: 1fr;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            .aksi-column {
                position: static;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fas fa-paw"></i> Sistem Pendukung Keputusan Tempat Grooming</h1>
    
    @if(session('error'))
        <div class="error-message">
            <i class="fas fa-exclamation-circle"></i>
            <div>{{ session('error') }}</div>
        </div>
    @endif
    
    <form action="/spk/process" method="POST">
        @csrf
        
        <div class="section">
            <h2><i class="fas fa-weight-hanging"></i> Kriteria dan Bobot</h2>
            <p style="color: var(--text-light); margin-bottom: 15px;">Total bobot harus bernilai 1.00</p>
            
            <div id="kriteria-container" class="criteria-container">
                @php
                    $kriteria = [
                        ['key' => 'distance', 'label' => 'Jarak (km)', 'bobot' => 0.25],
                        ['key' => 'price', 'label' => 'Harga (Rp)', 'bobot' => 0.20],
                        ['key' => 'rating', 'label' => 'Rating', 'bobot' => 0.25],
                        ['key' => 'facilities', 'label' => 'Fasilitas', 'bobot' => 0.15],
                        ['key' => 'queue', 'label' => 'Keramahan', 'bobot' => 0.15],
                    ];
                @endphp
                
                @foreach($kriteria as $k)
                    <div class="criteria-item">
                        <div class="criteria-input">
                            <input type="text" name="kriteria[{{ $k['key'] }}][label]" value="{{ $k['label'] }}" placeholder="Nama Kriteria" required>
                        </div>
                        <div style="min-width: 80px;">
                            <input type="number" name="kriteria[{{ $k['key'] }}][bobot]" step="0.01" value="{{ $k['bobot'] }}" min="0" max="1" placeholder="Bobot" required>
                        </div>
                        <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="hapusKriteria(this, '{{ $k['key'] }}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>
            
            <div class="total-weight">
                Total Bobot: <span id="total-bobot">0.00</span>
            </div>
            
            <button type="button" class="btn btn-outline" onclick="tambahKriteria()">
                <i class="fas fa-plus"></i> Tambah Kriteria
            </button>
        </div>
        
        <div class="section">
            <h2><i class="fas fa-list-ul"></i> Alternatif Tempat Grooming</h2>
            
            <table id="alternatif-table">
                <thead>
                    <tr>
                        <th>Nama Tempat</th>
                        @foreach($kriteria as $k)
                            <th data-kolom="{{ $k['key'] }}">{{ $k['label'] }}</th>
                        @endforeach
                        <th class="aksi-column">Aksi</th>
                    </tr>
                </thead>
                <tbody id="alternatif-body">
                    @php
                        $places = [
                            ["name" => "Grooming Ceria", "distance" => 2.5, "price" => 85000, "rating" => 4.7, "facilities" => 2.1, "queue" => 4.2],
                            ["name" => "PetCare & Spa", "distance" => 1.8, "price" => 90000, "rating" => 4.9, "facilities" => 3.1, "queue" => 4.5],
                            ["name" => "Rumah Grooming Kita", "distance" => 3.2, "price" => 80000, "rating" => 4.5, "facilities" => 1.1, "queue" => 4.0],
                            ["name" => "Paws & Bubbles", "distance" => 2.0, "price" => 95000, "rating" => 4.8, "facilities" => 4.1, "queue" => 4.5],
                            ["name" => "Happy Paws Studio", "distance" => 2.4, "price" => 88000, "rating" => 4.6, "facilities" => 3.5, "queue" => 4.3],
                        ];
                    @endphp
                    
                    @foreach($places as $i => $p)
                        <tr>
                            <td><input type="text" class="table-input" name="alternatif[{{ $i }}][name]" value="{{ $p['name'] }}" required></td>
                            @foreach($kriteria as $k)
                                <td class="kolom-{{ $k['key'] }}">
                                    <input type="number" class="table-input" name="alternatif[{{ $i }}][{{ $k['key'] }}]" value="{{ $p[$k['key']] }}" step="0.01" required>
                                </td>
                            @endforeach
                            <td class="aksi-column">
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapusAlternatif(this)">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <button type="button" class="btn btn-outline" onclick="tambahAlternatif()">
                <i class="fas fa-plus"></i> Tambah Alternatif
            </button>
        </div>
        
        <div class="action-buttons">
            <button type="reset" class="btn btn-outline">
                <i class="fas fa-redo"></i> Reset
            </button>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-calculator"></i> Proses SPK
            </button>
        </div>
    </form>
</div>

<script>
    let kriteriaKeys = @json(array_column($kriteria, 'key'));
    let alternatifCount = {{ count($places) }};
    
    // Hitung total bobot saat pertama kali load
    document.addEventListener('DOMContentLoaded', function() {
        hitungTotalBobot();
        
        // Tambahkan event listener untuk semua input bobot
        document.querySelectorAll('input[name^="kriteria["][name$="][bobot]"]').forEach(input => {
            input.addEventListener('input', hitungTotalBobot);
        });
    });
    
    function hitungTotalBobot() {
        let total = 0;
        document.querySelectorAll('input[name^="kriteria["][name$="][bobot]"]').forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById('total-bobot').textContent = total.toFixed(2);
    }
    
    function tambahKriteria() {
        const key = prompt("Masukkan key unik kriteria (contoh: kenyamanan):");
        if (!key) return;
        if (kriteriaKeys.includes(key)) return alert("Key sudah ada!");
        
        const label = prompt("Masukkan label kriteria:");
        if (!label) return;
        
        kriteriaKeys.push(key);
        
        // Tambahkan ke kriteria container
        const kriteriaHTML = `
            <div class="criteria-item">
                <div class="criteria-input">
                    <input type="text" name="kriteria[${key}][label]" value="${label}" placeholder="Nama Kriteria" required>
                </div>
                <div style="min-width: 80px;">
                    <input type="number" name="kriteria[${key}][bobot]" step="0.01" value="0.10" min="0" max="1" placeholder="Bobot" required>
                </div>
                <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="hapusKriteria(this, '${key}')">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `;
        document.getElementById('kriteria-container').insertAdjacentHTML('beforeend', kriteriaHTML);
        
        // Tambahkan event listener untuk input bobot yang baru
        document.querySelector('input[name="kriteria[' + key + '][bobot]"]').addEventListener('input', hitungTotalBobot);
        hitungTotalBobot();
        
        // Tambahkan kolom ke tabel alternatif SEBELUM kolom AKSI
        const headerRow = document.querySelector('#alternatif-table thead tr');
        const aksiHeader = headerRow.querySelector('.aksi-column');
        const newHeader = document.createElement('th');
        newHeader.textContent = label;
        newHeader.setAttribute('data-kolom', key);
        headerRow.insertBefore(newHeader, aksiHeader);

        // Tambahkan cell untuk setiap row data SEBELUM kolom AKSI
        const rows = document.querySelectorAll('#alternatif-body tr');
        rows.forEach((row, i) => {
            const newCell = document.createElement('td');
            newCell.className = `kolom-${key}`;
            newCell.innerHTML = `<input type="number" class="table-input" name="alternatif[${i}][${key}]" step="0.01" required>`;
            const aksiCell = row.querySelector('.aksi-column');
            row.insertBefore(newCell, aksiCell);
        });
    }
    
    function hapusKriteria(button, key) {
        if (!confirm("Apakah Anda yakin ingin menghapus kriteria ini?")) return;
        
        // Hapus item kriteria
        button.closest('.criteria-item').remove();
        
        // Hapus dari array keys
        kriteriaKeys = kriteriaKeys.filter(k => k !== key);
        
        // Hapus kolom dari tabel (kecuali kolom aksi)
        document.querySelector(`th[data-kolom="${key}"]`)?.remove();
        document.querySelectorAll(`.kolom-${key}`).forEach(td => td.remove());
        
        hitungTotalBobot();
    }
    
    function tambahAlternatif() {
        let html = `<tr><td><input type="text" class="table-input" name="alternatif[${alternatifCount}][name]" required></td>`;
        
        // Tambahkan input untuk semua kriteria
        for (let key of kriteriaKeys) {
            html += `<td class="kolom-${key}"><input type="number" class="table-input" name="alternatif[${alternatifCount}][${key}]" step="0.01" required></td>`;
        }
        
        // Tambahkan kolom aksi di akhir
        html += `
            <td class="aksi-column">
                <button type="button" class="btn btn-danger btn-sm" onclick="hapusAlternatif(this)">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </td>
        </tr>`;
        
        document.getElementById('alternatif-body').insertAdjacentHTML('beforeend', html);
        alternatifCount++;
    }
    
    function hapusAlternatif(button) {
        if (!confirm("Apakah Anda yakin ingin menghapus alternatif ini?")) return;
        button.closest('tr').remove();
    }
</script>
</body>
</html>