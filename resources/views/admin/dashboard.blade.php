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
            <p class="fw-bold text-primary">
                Masuk sebagai <span class="link-success">{{ Auth::user()->name }}</span>
            </p>
            <h2>Dashboard Pasien Sindrom Metabolik</h2>
            <p class="text-muted">Pantau dan kelola data pasien dengan mudah.
                Dashboard ini membantu Anda mencatat, memantau, dan menganalisis indikator sindrom metabolik pasien,
                termasuk gula darah, tekanan darah, dan profil lipid, untuk mendukung keputusan medis yang lebih baik.
            </p>

            <table class="table table-hover table-borderless">
                <thead>
                    <tr class="table-success">
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
                            <td><a href="{{ route('admin.pasien.show', $p) }}" class="btn btn-sm btn-success">Detail
                                    >></a>
                                <a type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#updatePasien" data-id="{{ $p->id }}"
                                    data-nama="{{ $p->nama }}" data-nik="{{ $p->nik }}"
                                    data-jenis_kelamin="{{ $p->jenis_kelamin }}">
                                    Sunting
                                </a>
                            </td>
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

    <!-- Modal -->
    <div class="modal fade" id="updatePasien" tabindex="-1" aria-labelledby="updatePasienLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updatePasienLabel">Update Pasien</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.pasien.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="edit-nama" name="nama">
                        </div>

                        <div class="mb-3">
                            <label for="edit-nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="edit-nik" name="nik">
                        </div>

                        <div class="mb-3">
                            <fieldset>
                                <legend class="h6">Jenis Kelamin</legend>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="kelamin" id="modal-pria" value="PRIA"
                                        class="form-check-input">
                                    <label for="modal-pria" class="form-check-label">Pria</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input type="radio" name="kelamin" id="modal-wanita" value="WANITA"
                                        class="form-check-input">
                                    <label for="modal-wanita" class="form-check-label">Wanita</label>
                                </div>
                            </fieldset>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const updatePasienModal = document.getElementById("updatePasien");

            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                var toastElement = document.getElementById("liveToast");
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }

            updatePasienModal.addEventListener("show.bs.modal", function(event) {
                let button = event.relatedTarget;

                // Get data attributes from button
                let id = button.getAttribute("data-id");
                let nama = button.getAttribute("data-nama");
                let nik = button.getAttribute("data-nik");
                let jenisKelamin = button.getAttribute("data-jenis_kelamin");


                setTimeout(() => {
                    // Populate modal fields
                    document.getElementById("edit-id").value = id;
                    document.getElementById("edit-nama").value = nama;
                    document.getElementById("edit-nik").value = nik;
                    // Set radio button selection
                    if (jenisKelamin === "PRIA") {
                        document.getElementById('modal-pria').checked = true;
                    } else if (jenisKelamin === "WANITA") {
                        document.getElementById('modal-wanita').checked = true;
                    }
                }, 100);
            });
        });
    </script>
</body>

</html>
