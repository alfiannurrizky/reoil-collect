@extends('layouts.template_default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Produk</h4>
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
            <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal"
                data-bs-target="#modalTambahProduk">
                Tambah Produk
            </button>

            <div class="modal fade text-left" id="modalTambahProduk" tabindex="-1" role="dialog"
                aria-labelledby="modalTambahProdukLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTambahProdukLabel">Tambah Produk</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>

                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="name">Nama Produk: <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input id="name" type="text" name="name" class="form-control"
                                        placeholder="Contoh: Oli Olahan X" required>
                                </div>

                                <label for="price">Harga per Drum (Rp): <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input id="price" type="number" name="price" class="form-control"
                                        placeholder="Contoh: 1500000" min="0" required>
                                </div>

                                <label for="stock">Stok (Drum): <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input id="stock" type="number" name="stock" class="form-control"
                                        placeholder="Contoh: 10" min="0" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
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
                        <th>Nama Produk</th>
                        <th>Harga / Drum</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-produk-{{ $product->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin hapus produk ini?')">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>
                            </td>
                        </tr>
                        <div class="modal fade text-left" id="modal-edit-produk-{{ $product->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="modalEditProdukLabel{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="modalEditProdukLabel{{ $product->id }}">Edit Produk
                                        </h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>

                                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-body">
                                            <label for="name">Nama Produk: <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input id="name" type="text" name="name" class="form-control"
                                                    value="{{ old('name', $product->name) }}" required>
                                            </div>

                                            <label for="price">Harga per Drum (Rp): <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input id="price" type="number" name="price" class="form-control"
                                                    value="{{ old('price', $product->price) }}" min="0" required>
                                            </div>

                                            <label for="stock">Stok (Drum): <span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <input id="stock" type="number" name="stock" class="form-control"
                                                    value="{{ old('stock', $product->stock) }}" min="0" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Tutup</span>
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
                    @empty
                        <tr>
                            <td colspan="4">Belum ada produk</td>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
@endsection
