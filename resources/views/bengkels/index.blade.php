@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Bengkel</h4>
                    </div>
                    <div class="p-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>

                    <div class="card-content">

                        <div class="card-body">
                            <a href="{{ route('bengkels.create') }}" class="btn btn-outline-success mb-3">
                                Tambah Data
                            </a>

                            <div class="table-responsive">
                                <table class="table" id="table-bengkel">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA BENGKEL</th>
                                            <th>ALAMAT</th>
                                            <th>TELEPON</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bengkels as $index => $bengkel)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $bengkel->name }}</td>
                                                <td>{{ $bengkel->address }}</td>
                                                <td>{{ $bengkel->phone }}</td>
                                                <td>
                                                    <a href="{{ route('bengkels.edit', $bengkel->id) }}" type="button"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <a href="{{ route('bengkels.show', $bengkel->id) }}"
                                                        class="btn btn-sm btn-primary" title="Detail">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a>

                                                    <form action="{{ route('bengkels.destroy', $bengkel->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin mau hapus bengkel ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if ($bengkels->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data bengkel</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
