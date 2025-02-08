<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar pasien baru</title>
</head>
<body>
    <h1>Daftar pasien baru</h1>
    <p>Daftarkan pasien baru</p>
    <a href="/">Kembali</a>
    <form action="/pasien-baru" method="POST">
        @csrf

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama">
        </div>

        <div class="form-group">
            <span>Jenis Kelamin</span>
            <input type="radio" name="kelamin" id="pria" value="PRIA">
            <label for="pria">Pria</label>
            <input type="radio" name="kelamin" id="wanita" value="WANITA">
            <label for="wanita">Wanita</label>
        </div>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>