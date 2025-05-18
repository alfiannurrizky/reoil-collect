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
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit-bengkel-{{ $bengkel->id }}"
                                                        title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>

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

                                            <!-- Modal untuk Edit Data Bengkel -->
                                            <div class="modal fade text-left" id="modal-edit-bengkel-{{ $bengkel->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="modalEditBengkelLabel{{ $bengkel->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"
                                                                id="modalEditBengkelLabel{{ $bengkel->id }}">Edit Data
                                                                Bengkel</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('bengkels.update', $bengkel->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-body">

                                                                <label for="name-{{ $bengkel->id }}">Nama Bengkel: <span
                                                                        style="color: red;">*</span></label>
                                                                <div class="form-group">
                                                                    <input id="name-{{ $bengkel->id }}" type="text"
                                                                        name="name" class="form-control"
                                                                        value="{{ old('name', $bengkel->name) }}" required>
                                                                </div>

                                                                <label for="address-{{ $bengkel->id }}">Alamat: <span
                                                                        style="color: red;">*</span></label>
                                                                <div class="form-group">
                                                                    <textarea id="address-{{ $bengkel->id }}" name="address" class="form-control" rows="3" required>{{ old('address', $bengkel->address) }}</textarea>
                                                                </div>

                                                                <label for="phone-{{ $bengkel->id }}">Telepon: <span
                                                                        style="color: red;">*</span></label>
                                                                <div class="form-group">
                                                                    <input id="phone-{{ $bengkel->id }}" type="text"
                                                                        name="phone" class="form-control"
                                                                        value="{{ old('phone', $bengkel->phone) }}"
                                                                        required>
                                                                </div>

                                                                <label
                                                                    for="description-{{ $bengkel->id }}">Deskripsi:</label>
                                                                <div class="form-group">
                                                                    <textarea id="description-{{ $bengkel->id }}" name="description" class="form-control" rows="3">{{ old('description', $bengkel->description) }}</textarea>
                                                                </div>

                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-primary ms-1">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Simpan</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
