<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Gym</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .receipt-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
        }
        .details {
            margin-bottom: 15px;
        }
        .details p {
            margin: 5px 0;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="header">
            <h2>Gym Anda</h2>
            <p>Alamat: Jl. Contoh, Bogor</p>
            <p>No. Telp: 0812-3456-7890</p>
        </div>

        <div class="details">
            <p><strong>Tanggal:</strong> {{ $date }}</p>
            <p><strong>Nama:</strong> {{ $name }}</p>
            <p><strong>Jenis Paket:</strong> {{ $package }}</p>
            <p><strong>Durasi:</strong> {{ $duration }} jam</p>
            <p><strong>Harga per Jam:</strong> Rp {{ number_format($pricePerHour, 0, ',', '.') }}</p>
        </div>

        <div class="total">
            Total Bayar: Rp {{ number_format($total, 0, ',', '.') }}
        </div>

        <div class="footer">
            Terima kasih telah berkunjung ke gym kami!<br>
            Semoga sehat selalu!
        </div>
    </div>
</body>
</html>
