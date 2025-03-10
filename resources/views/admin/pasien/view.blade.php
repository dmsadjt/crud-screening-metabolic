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
            <p class="fw-bold text-primary">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">
                    <i class="bi bi-arrow-left"></i>
                </a>
                Masuk sebagai <span class="link-success">{{ Auth::user()->name }}</span>
            </p>
            <h2>{{ $pasien->nama }}</h2>
            <p class="fs-6">NIK {{ $pasien->nik }} | {{ $pasien->jenis_kelamin }}</p>
            <p class="fs-5 fw-bold">Riwayat Screening</p>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 10%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: 5%;">
                    <col style="width: 40%;">
                    <col style="width: 15%;">
                </colgroup>

                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>LP</th>
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
                                @if ($item->diagnosa > 1)
                                    <span class="text-danger fw-bold">{{ $item->diagnosis->keterangan }}
                                    </span><br>
                                    <span class="fw-light">{{ $item->diagnosis->deskripsi }}</span>
                                @else
                                    <span class="text-success fw-bold">Normal</span>
                                    <span class="fw-light">{{ $item->diagnosis->deskripsi }}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#updateRekam"
                                    data-lp="{{ $item->lingkar_pinggang }}"
                                    data-trigliserida="{{ $item->trigliserida }}" data-hdl="{{ $item->hdl }}"
                                    data-sistolik="{{ $item->sistolik }}" data-diastolik="{{ $item->diastolik }}"
                                    data-gula="{{ $item->gula }}" data-id="{{ $item->id }}"
                                    data-pasien="{{ $item->pasien_id }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if ($item->diagnosa > 1)
                                    <a class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#rekomendasi" data-diagnosis={{ $item->diagnosa }}>
                                        <i class="bi bi-file-earmark-medical"></i>
                                    </a>
                                    {{-- <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#toga" --}}
                                    {{-- data-diagnosis={{ $item->toga }}>><i class="bi bi-flower3"></i> --}}
                                    {{-- </a> --}}
                                @endif
                                <form action="{{ route('admin.rekam.delete', $item) }}" method="POST"
                                    style="display:inline;">
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

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Notifikasi</strong>
                    <small>Baru saja</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="rekomendasi" tabindex="-1" aria-labelledby="rekomendasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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

    <div class="modal fade" id="updateRekam" tabindex="-1" aria-labelledby="updateRekamLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateRekamLabel">Update Riwayat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateRekamForm" action="{{ route('admin.rekam.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="edit-id">
                        <input type="hidden" name="pasien_id" id="edit-pasien">

                        <div class="mb-3">
                            <label for="edit-lp" class="form-label">Lingkar Pinggang (cm)</label>
                            <input type="number" class="form-control" id="edit-lp" name="lingkar_pinggang"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-trigliserida" class="form-label">Trigliserida (mg/dL)</label>
                            <input type="number" class="form-control" id="edit-trigliserida" name="trigliserida"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-hdl" class="form-label">HDL (mg/dL)</label>
                            <input type="number" class="form-control" id="edit-hdl" name="hdl" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-sistolik" class="form-label">Sistolik (mmHg)</label>
                            <input type="number" class="form-control" id="edit-sistolik" name="sistolik" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-diastolik" class="form-label">Diastolik (mmHg)</label>
                            <input type="number" class="form-control" id="edit-diastolik" name="diastolik"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-gula" class="form-label">Gula Darah (mg/dL)</label>
                            <input type="number" class="form-control" id="edit-gula" name="gula" required>
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
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

        document.addEventListener("DOMContentLoaded", function() {
            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                var toastElement = document.getElementById("liveToast");
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        })

        document.getElementById("updateRekam").addEventListener("show.bs.modal", function(event) {
            let button = event.relatedTarget;

            // Get data attributes from button
            let id = button.getAttribute("data-id");
            let pasienId = button.getAttribute("data-pasien");
            let lingkarPinggang = button.getAttribute("data-lp");
            let trigliserida = button.getAttribute("data-trigliserida");
            let hdl = button.getAttribute("data-hdl");
            let sistolik = button.getAttribute("data-sistolik");
            let diastolik = button.getAttribute("data-diastolik");
            let gula = button.getAttribute("data-gula");

            setTimeout(() => {
                // Populate modal fields
                document.getElementById("edit-id").value = id;
                document.getElementById("edit-pasien").value = pasienId;
                document.getElementById("edit-lp").value = lingkarPinggang;
                document.getElementById("edit-trigliserida").value = trigliserida;
                document.getElementById("edit-hdl").value = hdl;
                document.getElementById("edit-sistolik").value = sistolik;
                document.getElementById("edit-diastolik").value = diastolik;
                document.getElementById("edit-gula").value = gula;
            }, 100);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
