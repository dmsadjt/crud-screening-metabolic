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
    <title>Daftar pasien baru</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="container border m-5 p-5 rounded bg-light">
            <a href="/" class="btn btn-sm btn-outline-danger mb-3">Kembali</a>
            <h1>Daftar pasien baru</h1>
            <p>Daftarkan pasien baru</p>
            <form action="/pasien-baru" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                        class="form-control">
                    @error('nik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="form-control">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <span>Jenis Kelamin</span><br>
                    <input type="radio" name="kelamin" id="pria" value="PRIA" class="form-check-input"
                        {{ old('kelamin') == 'PRIA' ? 'checked' : '' }}>
                    <label for="pria" class="form-check-label">Pria</label>
                    <input type="radio" name="kelamin" id="wanita" value="WANITA" class="form-check-input"
                        {{ old('kelamin') == 'WANITA' ? 'checked' : '' }}>
                    <label for="wanita" class="form-check-label">Wanita</label>
                    @error('kelamin')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Daftar</button>
            </form>

        </div>
    </div>


</body>

</html>
