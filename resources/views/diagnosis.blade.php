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
    <title>Diagnosa</title>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="container border m-5 p-5 rounded bg-light">
            @if (session('error'))
                {{ session('error') }}
            @endif
            <a href="/" class="btn btn-sm btn-outline-danger mb-3">Kembali</a>
            <h1>Diagnosa Sindrom Metabolik</h1>
            <p>Masukkan data Anda untuk mengetahui risiko sindrom metabolik</p>
            <form method="POST" action="/diagnosa-baru" id="form-diagnosa">
                @csrf
                <input type="hidden" value="{{ $pasien->id }}" name="pasien_id" id="pasien_id">

                <div class="form-group mb-3">
                    <label class="form-label" for="lp">Lingkar Pinggang (cm)</label>
                    <input type="number" class="form-control" name="lp" id="lp"
                        value="{{ old('lp') }}">
                    @error('lp')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="trig">Trigliserida (mg/dL)</label>
                    <input type="number" class="form-control" name="trig" id="trig"
                        value="{{ old('trig') }}">
                    @error('trig')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="hdl">HDL Kolesterol (mg/dL)</label>
                    <input type="number" class="form-control" name="hdl" id="hdl"
                        value="{{ old('hdl') }}">
                    @error('hdl')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="sistolik">Tekanan Darah Sistolik (mmHg)</label>
                    <input type="number" class="form-control" name="sistolik" id="sistolik"
                        value="{{ old('sistolik') }}">
                    @error('sistolik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="diastolik">Tekanan Darah Diastolik (mmHg)</label>
                    <input type="number" class="form-control" name="diastolik" id="diastolik"
                        value="{{ old('diastolik') }}">
                    @error('diastolik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label" for="gula">Gula Darah Puasa (mg/dL)</label>
                    <input type="number" class="form-control" name="gula" id="gula"
                        value="{{ old('gula') }}">
                    @error('gula')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Diagnosa</button>
            </form>
        </div>
    </div>

</body>

<footer>
</footer>

</html>
