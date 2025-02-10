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
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100 flex-column">
        <div class="container border m-5 p-5 rounded bg-light">
            <h2>Dashboard Pasien Sindrom Metabolik</h2>
            <p class="text-muted">Pantau dan kelola data pasien dengan mudah. 
                Dashboard ini membantu Anda mencatat, memantau, dan menganalisis indikator sindrom metabolik pasien, 
                termasuk gula darah, tekanan darah, dan profil lipid, untuk mendukung keputusan medis yang lebih baik.</p>

            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="table-dark">
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Detail pasien</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $key => $p)
                        <tr class="table-light">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>
                                {{ $p->nik }}
                            </td>
                            <td>
                                {{ $p->jenis_kelamin }}
                            </td>
                            <td><a href="{{ route('admin.pasien.show', $p)}}" class="btn btn-sm btn-success">Detail >></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tr class="table-light">
                    <td colspan="6" class="text-center">
                        {{ $pasien->links('pagination::bootstrap-5') }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

<footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</footer>

</html>
