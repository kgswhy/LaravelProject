@extends('frontend.layouts.app')

@section('content')
    <div class="container my-4 d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center">Cek Aspirasi</h1>
                    <div class="row mb-3">
                        <div class="col">
                            <form class="d-flex mb-3" role="search">
                                <a href="/" class="btn btn-danger shadow me-2"><i
                                        class="bi bi-arrow-left-square"></i></a>
                                <input name="search" class="form-control me-2 shadow-sm" type="search"
                                    placeholder="Cari berdasarkan id" aria-label="Search">
                                <input name="tanggal" id="tanggalPicker" class="form-control me-2 shadow-sm" type="text"
                                    placeholder="Pilih Tanggal" aria-label="Tanggal">
                                <select name="status" class="form-select me-2 shadow-sm" aria-label="Status">
                                    <option value="" selected>Semua Status</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <button class="btn btn-outline-success shadow-sm" type="submit"><i
                                        class="bi bi-search"></i></button>
                            </form>
                        </div>

                    </div>

                    @if ($aspirasis->count())
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($aspirasis as $aspirasi)
                                <div class="col">
                                    <div class="card h-100 shadow">
                                        <div class="position-relative" style="height: 200px;">
                                            <!-- Atur tinggi gambar agar sesuai dengan kartu -->
                                            <img src="{{ asset('storage/' . $aspirasi->gambar) }}" class="card-img-top"
                                                alt="Gambar Aspirasi" style="object-fit: cover; height: 100%; width: 100%;">
                                            <div class="position-absolute start-0 bottom-0 ms-3 mb-3">
                                                <!-- Badge menampilkan waktu dibuat -->                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                                                <span
                                                    class="badge bg-dark p-2 shadow">{{ $aspirasi->created_at->format('d M Y') }}</span>
                                            </div>
                                            <div class="position-absolute top-0 end-0 mt-3 me-3">
                                                <!-- Badge menampilkan status -->
                                                <span
                                                    class="badge bg-{{ $aspirasi->status == 'Menunggu' ? 'warning text-dark' : ($aspirasi->status == 'Proses' ? 'primary' : 'success') }} shadow text-bold p-2">{{ $aspirasi->status }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div>
                                                <h5 class="card-title">ID: {{ $aspirasi->kode_pengaduan }}</h5>
                                                <p class="card-text mb-3">{{ $aspirasi->keterangan }}</p>
                                                <p class="card-text mb-0">Kategori: {{ $aspirasi->category->ket_kategori }}
                                                </p>
                                            </div>
                                            <a href="/aspirasis/{{ $aspirasi->id }}"
                                                class="btn btn-{{ $aspirasi->status == 'Menunggu' ? 'warning' : ($aspirasi->status == 'Proses' ? 'primary' : 'success') }} mt-3 shadow"><i
                                                    class="bi bi-eye"></i> Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Show toast if search results not found -->
                        <div class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive"
                            aria-atomic="true" id="toast-not-found"
                            style="position: fixed; top: 50px; left: 50%; transform: translateX(-50%); z-index: 10000;">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Aspirasi tidak ditemukan.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>


                        <!-- JavaScript to show the toast -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#toast-not-found').toast('show');
                                setTimeout(function() {
                                    $('#toast-not-found').fadeOut('slow');
                                }, 3000);
                            });
                            flatpickr("#tanggalPicker", {
                                mode: "range",
                                clickOpens: true
                            });
                        </script>
                    @endif
                </div>
                <!-- CSS Flatpickr -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

                <!-- JS Flatpickr -->
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script>
                    flatpickr("#tanggalPicker", {
                        mode: "range",
                        clickOpens: true
                    });
                </script>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $aspirasis->links() }}
                </div>




            @endsection
