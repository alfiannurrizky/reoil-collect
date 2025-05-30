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
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalPesan-{{ $product->id }}">
                                    Pesan
                                </button>
                            </td>
                        </tr>
                        {{-- <div class="modal fade" id="modalPesan-{{ $product->id }}" tabindex="-1"
                            aria-labelledby="modalPesanLabel-{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('bengkel.order.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPesanLabel-{{ $product->id }}">Pesan Produk:
                                                {{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Stok tersedia: <strong>{{ $product->stock }}</strong> drum</p>

                                            <div class="form-group mb-3">
                                                <label for="quantity-{{ $product->id }}">Jumlah yang ingin dipesan
                                                    (drum)
                                                </label>
                                                <input type="number" name="quantity" id="quantity-{{ $product->id }}"
                                                    class="form-control" min="1" max="{{ $product->stock }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Kirim Pesanan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <!-- Modal Pemesanan -->
                        <div class="modal fade" id="modalPesan-{{ $product->id }}" tabindex="-1"
                            aria-labelledby="modalPesanLabel-{{ $product->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('bengkels.order.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pesan Produk - {{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <p>Stok tersedia: {{ $product->stock }}</p>

                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Jumlah</label>
                                                <input type="number" name="quantity" class="form-control" min="1"
                                                    max="{{ $product->stock }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Lanjutkan Pembayaran</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </form>
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
