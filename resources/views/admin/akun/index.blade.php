@extends('layouts.template_default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Akun Bengkel</h4>
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card-body table-responsive">
            <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#inlineForm">
                Buat Akun
            </button>

            <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">Tambah Akun</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>

                        <form action="{{ route('admin.akun.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="name">Nama: <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <input id="name" type="text" name="name" class="form-control"
                                        placeholder="Masukkan Nama" required>
                                </div>

                                <label for="email">Email: <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <input id="email" type="text" name="email" class="form-control"
                                        placeholder="Masukkan Email" required>
                                </div>

                                <label for="password">Password: <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <input id="password" type="password" name="password" class="form-control"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
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

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($accounts as $index => $account)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->email }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-laporan-{{ $account->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="{{ route('admin.akun.destroy', $account->id) }}" method="POST"
                                    style="display:inline-block;" onsubmit="return confirm('Yakin mau hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade text-left" id="modal-edit-laporan-{{ $account->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel33">Edit Data account
                                        </h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.akun.update', $account->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-body">
                                            <label for="name">Nama: </label>
                                            <div class="form-group">
                                                <input id="name" type="text" name="name" class="form-control"
                                                    placeholder="Masukkan Nama" value="{{ old('name', $account->name) }}"
                                                    required>
                                            </div>

                                            <label for="email">Email: </label>
                                            <div class="form-group">
                                                <input id="email" type="text" name="email" class="form-control"
                                                    placeholder="Masukkan Email"
                                                    value="{{ old('email', $account->email) }}" required>
                                            </div>

                                            <label for="password">Password: </label>
                                            <div class="form-group">
                                                <input id="password" type="password" name="password"
                                                    class="form-control" placeholder="Masukkan password">
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
                </tbody>

            </table>
        </div>
    </div>
@endsection
