@extends('layouts.template_default')
@section('content')
    <div class="card">
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
            <div class="container">
                <h4>Pembayaran Pesanan</h4>
                <p>Produk: {{ $order->product->name }}</p>
                <p>Jumlah: {{ $order->quantity }}</p>
                <p>Total Harga: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

                <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $order->snap_token }}', {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    window.location.href = "/bengkel/products";
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran...");
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                }
            });
        };
    </script>
@endsection
