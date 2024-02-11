@extends('frontend.layouts.app')

@section('content')
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="m-0">Detail Aspirasi</h1>
                        <a href="#" class="btn btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <p class="">Keterangan Gambar:</p>
                                <img src="{{ asset('storage/' . $aspirasi->gambar) }}" class="img-fluid"
                                    alt="Gambar Aspirasi">
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input name="nik" type="number" class="form-control" id="nik"
                                        value="{{ $aspirasi->nik }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Kategori</label>
                                    <input name="category_id" type="text" class="form-control" id="category_id"
                                        value="{{ $aspirasi->category->ket_kategori }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi</label>
                                    <input name="lokasi" type="text" class="form-control" id="lokasi"
                                        value="{{ $aspirasi->lokasi }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input name="status" type="text" class="form-control" id="status"
                                        value="{{ $aspirasi->status }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="keterangan" rows="3" disabled>{{ $aspirasi->ket }}</textarea>
                                </div>
                                @if ($aspirasi->status != 'Menunggu')
                                    <div class="mb-3">
                                        <label for="feedback" class="form-label">Feedback</label>
                                        <textarea name="feedback" class="form-control" id="feedback" rows="3" disabled>{{ $aspirasi->feedback }}</textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
