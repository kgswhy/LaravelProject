@extends('backend.layouts.app')

@section('content')
    {{-- form aspirasi --}}
    <div class="container my-4 d-flex justify-content-start">
        <div class="col">
            <a href="/dashboard/categories" class="btn btn-danger shadow"><i class="bi bi-arrow-left-square"></i> Kembali</a>
        </div>
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body shadow">

                    <h1 class="text-center">Tambah Kategori</h1>
                    <form method="POST" action="/dashboard/categories">
                        @csrf
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Nama Kategori</label>
                            <input name="ket_kategori" type="text" value="{{ old('ket_kategori') }}"
                                class="form-control @error('ket_kategori') is-invalid @enderror" id="kategori">
                            @error('ket_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square"></i> Tambah
                            Kategori</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
