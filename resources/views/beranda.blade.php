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
    <title>Screening Sindrom Metabolik</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="container border m-5 p-5 rounded bg-light">
            <h1>Screening Sindrom Metabolik</h1>
            <p>Lakukan screening untuk mengetahui risiko metabolik.</p>
            <form action="/diagnosa">
                <div class="mb-3">
                    <label for="nik" class="form-label">Masukkan NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control">
                </div>
                <button type="submit" class="btn btn-dark mb-3">Cari</button>
            </form>
            <p>Belum pernah screening? daftar sebagai pasien baru</p>
            <a href="/baru" class="btn btn-outline-info mb-3">Pasien baru</a><br>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
