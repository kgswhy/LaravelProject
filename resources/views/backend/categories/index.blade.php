@extends('backend.layouts.app')

@section('content')
    {{-- Table Aspirasi --}}
    <div class="container my-4 d-flex justify-content-start">
        <div class="col">
            <a href="/dashboard/categories/create" class="btn btn-primary shadow"><i class="bi bi-plus-square"></i> Tambah
                Kategori</a>
        </div>
        <div class="col-lg-10">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h1>Kategori Aspirasi</h1>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered border-dark table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->ket_kategori }}</td>
                                    <td>
                                        <a href="/dashboard/categories/{{ $category->id }}/edit"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                        <form method="POST" action="/dashboard/categories/{{ $category->id }}"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="confirm('Yakin ingin menghapus?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
