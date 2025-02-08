<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data tersimpan</title>
</head>

<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('pasien'))
        <p>ID: {{ session('pasien')->id }}</p>
        <p>Nama: {{ session('pasien')->nama }}</p>
        <p>NIK: {{session('pasien')->nik}}</p>
        <p>Jenis Kelamin: {{ session('pasien')->jenis_kelamin }}</p>
    @endif

    @if (session('rekam'))
        <p>{{session('rekam')->diagnosa}}</p>
    @endif

    <a href="/">Kembali ke beranda</a>
</body>

</html>
