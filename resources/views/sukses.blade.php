<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <title>Data tersimpan</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="container border m-5 p-5 rounded bg-light">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('pasien'))
                <p>ID: {{ session('pasien')->id }}</p>
                <p>Nama: {{ session('pasien')->nama }}</p>
                <p>NIK: {{ session('pasien')->nik }}</p>
                <p>Jenis Kelamin: {{ session('pasien')->jenis_kelamin }}</p>
            @endif

            @if (session('rekam'))
                <p>Gula Darah Puasa: {{ session('rekam')->gula }} mg/dL</p>
                <p>Trigliserida: {{ session('rekam')->trigliserida }} mg/dL</p>
                <p>Kolesterol HDL: {{ session('rekam')->hdl }} mg/dL</p>
                <p>Tekanan Darah: {{ session('rekam')->sistolik }}/{{ session('rekam')->diastolik }} mmHg</p>
                <p>Lingkar Pinggang: {{ session('rekam')->lingkar_pinggang }} cm</p>
                <p>Hasil Diagnosa:
                    @if (session('rekam')->diagnosa > 1)
                        <span class="text-danger fw-bold">{{ session('rekam')->diagnosis->keterangan }}
                        </span><br>
                    @else
                        <span class="text-success fw-bold">Normal</span>
                    @endif
                </p>
            @endif

            <a href="/" class="btn btn-outline-dark">Kembali ke beranda</a>
        </div>
    </div>

</body>

</html>
