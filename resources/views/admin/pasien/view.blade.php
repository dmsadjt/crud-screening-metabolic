<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>Detail Pasien {{ $pasien->nama }}</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100 flex-column">
        <div class="container border m-5 p-5 rounded bg-light">
            <h2>{{ $pasien->nama }}</h2>
            <p class="fs-6">NIK {{ $pasien->nik }} | {{ $pasien->jenis_kelamin }}</p>
            <p class="fs-5 fw-bold">Riwayat Screening</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Lingkar Pinggang</th>
                        <th>Trigliserida</th>
                        <th>HDL</th>
                        <th>Sistolik</th>
                        <th>Diastolik</th>
                        <th>Gula</th>
                        <th>Diagnosa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($riwayat as $item)
                        <tr>
                            <td>

                                {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}

                            </td>
                            <td>
                                {{ $item->lingkar_pinggang }}
                            </td>
                            <td>
                                {{ $item->trigliserida }}
                            </td>
                            <td>
                                {{ $item->hdl }}
                            </td>
                            <td>
                                {{ $item->sistolik }}
                            </td>
                            <td>
                                {{ $item->diastolik }}
                            </td>
                            <td>
                                {{ $item->gula }}
                            </td>
                            <td>
                                @if ($item->diagnosa == 1)
                                    <span class="text-danger">Sindrom Metabolik</span>
                                @else
                                    <span class="text-success">Normal</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
