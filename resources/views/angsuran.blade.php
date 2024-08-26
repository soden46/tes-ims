<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Angsuran Mobil</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Kalkulator Angsuran Mobil</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hitung.angsuran') }}">
                            @csrf
                            <div class="form-group">
                                <label for="otr">Harga OTR:</label>
                                <input type="number" id="otr" name="otr" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="dp_percent">Down Payment (DP) %:</label>
                                <input type="number" id="dp_percent" name="dp_percent" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="jangka_waktu">Jangka Waktu (Bulan):</label>
                                <input type="number" id="jangka_waktu" name="jangka_waktu" class="form-control"
                                    required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Hitung Angsuran</button>
                        </form>
                    </div>
                </div>

                @if (isset($angsuran_per_bulan))
                    <div class="card mt-4">
                        <div class="card-header bg-success text-white">
                            <h4 class="text-center">Hasil Perhitungan</h4>
                        </div>
                        <div class="card-body">
                            <p>Pokok Utang: <strong>{{ number_format($pokok_utang, 2) }}</strong></p>
                            <p>Total Bunga: <strong>{{ number_format($total_bunga, 2) }}</strong></p>
                            <p>Total Pokok + Bunga: <strong>{{ number_format($total_pokok_dan_bunga, 2) }}</strong></p>
                            <p>Angsuran Per Bulan: <strong>{{ number_format($angsuran_per_bulan, 2) }}</strong></p>
                            <p>Jangka Waktu: <strong>{{ $jangka_waktu }}</strong> Bulan</p>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
