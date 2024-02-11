@extends('backend.layouts.app')

@section('content')
    {{-- form aspirasi --}}
    <div class="container my-4 d-flex justify-content-start">
        <div class="col">
            <a href="/dashboard" class="btn btn-danger shadow"><i class="bi bi-arrow-left-square"></i> Kembali</a>
        </div>
        <div class="col-lg-10">

            <h1>Detail Aspirasi</h1>

            <form action="/dashboard/aspirasis/{{ $aspirasi->id }}" method="POST">
                @csrf
                <div class="card shadow">
                    <div class="card-header">
                        <strong>Id Pelaporan : {{ $aspirasi->id }}</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">NIK : {{ $aspirasi->nik }}</li>
                        <li class="list-group-item">Kategori : {{ $aspirasi->category->ket_kategori }}</li>
                        <li class="list-group-item">Lokasi : {{ $aspirasi->lokasi }}</li>
                        <li class="list-group-item">
                            <label for="kategori" class="form-label">Status : </label>
                            <select name="status" class="form-select shadow-sm d-inline w-auto"
                                aria-label="Default select example" id="kategori">
                                <option {{ $aspirasi->status == 'Menunggu' ? 'selected' : '' }} value="Menunggu">Menunggu
                                </option>
                                <option {{ $aspirasi->status == 'Proses' ? 'selected' : '' }} value="Proses">Proses
                                </option>
                                <option {{ $aspirasi->status == 'Selesai' ? 'selected' : '' }} value="Selesai">Selesai
                                </option>
                            </select>
                        </li>
                    </ul>
                    <div class="card-body">
                        Keterangan :
                        <p>{{ $aspirasi->ket }}</p>

                        <label for="feedback" class="form-label">Feedback :</label>
                        <p>
                            <textarea name="feedback" class="form-control @error('feedback') is-invalid @enderror shadow-sm"
                                placeholder="Tulis feedback di sini" id="feedback">{{ $aspirasi->feedback }}</textarea>
                            @error('feedback')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </p>
                        <button class="btn btn-primary"><i class="bi bi-send"></i> Kirim Feedback</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
