<!DOCTYPE html>
<html>
<head>
    <title>Hasil SPK Tempat Grooming Hewan Peliharaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #e0e7ff;
            --secondary: #3f37c9;
            --danger: #ef233c;
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
            max-width: 900px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }
        
        .result-info {
            background-color: var(--primary-light);
            color: var(--secondary);
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            border-left: 4px solid var(--secondary);
        }
        
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 25px 0;
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 0 1px var(--border);
        }
        
        th, td {
            padding: 16px 20px;
            text-align: center;
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
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: var(--primary-light);
        }
        
        .rank-1 {
            background-color: #e3f2fd;
            font-weight: 600;
        }
        
        .rank-1 td:first-child {
            color: var(--primary);
            font-weight: 700;
        }
        
        .rank-1::after {
            content: '🏆';
            margin-left: 8px;
        }
        
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 1rem;
            text-decoration: none;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1><i class="fas fa-award"></i> Hasil Rekomendasi Tempat Grooming</h1>
    
    <div class="result-info">
        <i class="fas fa-info-circle"></i> Berikut adalah hasil perhitungan sistem untuk rekomendasi tempat grooming terbaik
    </div>

    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Nama Tempat</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $index => $r)
                <tr class="{{ $index === 0 ? 'rank-1' : '' }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r['name'] }}</td>
                    <td>{{ number_format($r['score'], 3) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="action-buttons">
        <a href="/spk" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali ke Form SPK
        </a>
    </div>
</div>

<script>
    function showDetails(data) {
        alert(`Detail Hasil:\n\nNama Tempat: ${data.name}\nSkor: ${data.score}\n\nDetail Kriteria:\n${formatCriteria(data.criteria)}`);
    }
    
    function formatCriteria(criteria) {
        return Object.entries(criteria).map(([key, value]) => {
            return `- ${key.charAt(0).toUpperCase() + key.slice(1)}: ${value}`;
        }).join('\n');
    }
</script>
</body>
</html>