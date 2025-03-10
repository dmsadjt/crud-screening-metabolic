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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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
                        <a class="btn btn-sm btn-success mt-3" data-bs-toggle="modal" data-bs-target="#rekomendasi"
                            data-diagnosis={{ session('rekam')->diagnosa }}>
                            <i class="bi bi-file-earmark-medical"></i> Edukasi
                        </a>
                    @else
                        <span class="text-success fw-bold">Normal</span>
                    @endif
                </p>
            @endif

            <a href="/" class="btn btn-outline-dark">Kembali ke beranda</a>
        </div>
    </div>

    <div class="modal fade" id="rekomendasi" tabindex="-1" aria-labelledby="rekomendasiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rekomendasiLabel">Rekomendasi dan Edukasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="rekomendasi-body" class="modal-body">
                    <p>Loading recommendation...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const rekomendasiModal = document.getElementById('rekomendasi');
        rekomendasiModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const diagnosisId = button.getAttribute('data-diagnosis');

            const rekomendasiBody = document.getElementById('rekomendasi-body');
            rekomendasiBody.innerHTML = '<p>Loading recommendations...</p>';

            fetch(`/recommendations/${diagnosisId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        rekomendasiBody.innerHTML = `<p>${data.message}</p>`;
                        return;
                    }

                    let content = '';
                    for (const [category, items] of Object.entries(data)) {
                        content += `<p class="fw-bold">${category}</p>`;
                        items.forEach(item => {
                            content += `<p>${item.recommendation}</p>`;
                        });
                    }
                    rekomendasiBody.innerHTML = content || '<p>No recommendations found.</p>';
                })
                .catch(() => {
                    rekomendasiBody.innerHTML = '<p>Failed to load recommendations.</p>';
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>


</html>
