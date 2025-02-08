<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diagnosa</title>
</head>
<body>
    @if (session('error'))
    {{session('error')}}
    @endif

    <h1>Diagnosa Sindrom Metabolik</h1>
    <p>Masukkan data Anda untuk mengetahui risiko sindrom metabolik</p>
    <a href="/">Kembali</a>
    <form method="POST" action="/diagnosa-baru" id="form-diagnosa">
        @csrf
        <input type="hidden" value="{{$pasien->id}}" name="pasien_id" id="pasien_id">
        <div class="form-group">
            <label for="lp">Lingkar Pinggang (cm)</label>
            <input type="number" name="lp" id="lp">
        </div>

        <div class="form-group">
            <label for="trig">Trigliserida (mg/dL)</label>
            <input type="number" name="trig" id="trig">
        </div>

        <div class="form-group">
            <label for="hdl">HDL Kolesterol (mg/dL)</label>
            <input type="number" name="hdl" id="hdl">
        </div>

        <div class="form-group">
            <label for="sistolik">Tekanan Darah Sistolik (mmHg)</label>
            <input type="number" name="sistolik" id="sistolik">
        </div>

        <div class="form-group">
            <label for="diastolik">Tekanan Darah Diastolik (mmHg)</label>
            <input type="number" name="diastolik" id="diastolik">
        </div>

        <div class="form-group">
            <label for="gula">Gula Darah Puasa (mg/dL)</label>
            <input type="number" name="gula" id="gula">
        </div>

        <button type="submit">Diagnosa</button>
    </form>
</body>

<footer>
</footer>
</html>