@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Data Bengkel {{ $bengkel->name }}</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <div class="mb-3">
                                <h5>Alamat</h5>
                                <p>{{ $bengkel->address }}</p>
                            </div>
                            <div class="mb-3">
                                <h5>Telepon</h5>
                                <p>{{ $bengkel->phone }}</p>
                            </div>
                            <div class="mb-3">
                                <h5>Deskripsi</h5>
                                <p>{{ $bengkel->description ?? '-' }}</p>
                            </div>

                            <h4 class="mb-3">Lokasi Bengkel</h4>
                            <div id="detailBengkelMap" class="map rounded"
                                data-coords='[{{ $bengkel->latitude }}, {{ $bengkel->longitude }}]' data-zoom="15"
                                data-name="{{ $bengkel->name }}" data-mode="detail" style="height: 400px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
