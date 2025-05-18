@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengaturan Situs</h4>
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
                            <form method="POST" action="{{ route('settings.update') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Nama Perusahaan</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                        value="{{ $settings['company_name'] ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="company_address" class="form-label">Alamat Perusahaan</label>
                                    <input type="text" name="company_address" id="company_address" class="form-control"
                                        value="{{ $settings['company_address'] ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="company_phone" class="form-label">No Telp Perusahaan</label>
                                    <input type="text" name="company_phone" id="company_phone" class="form-control"
                                        value="{{ $settings['company_phone'] ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="company_email" class="form-label">Email Perusahaan</label>
                                    <input type="email" name="company_email" id="company_email" class="form-control"
                                        value="{{ $settings['company_email'] ?? '' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="site_description" class="form-label">Deskripsi Perusahaan</label>
                                    <textarea name="site_description" id="site_description" class="form-control" rows="4">{{ $settings['site_description'] ?? '' }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="location_guide" class="form-label">Petunjuk Lokasi (satu per baris)</label>
                                    <textarea class="form-control" name="location_guide" id="location_guide" rows="4">{{ $settings['location_guide'] ?? '' }}</textarea>
                                </div>

                                <label class="form-label">Lokasi Bengkel</label>
                                <div id="settingMap" class="map"
                                    data-coords='[{{ $settings['company_latitude'] ?? '' }}, {{ $settings['company_longitude'] ?? '' }}]'
                                    data-zoom="13" data-mode="setting-map" style="height:400px;">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <input type="hidden" id="latitude" name="company_latitude" class="form-control"
                                            value="{{ $settings['company_latitude'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" id="longitude" name="company_longitude" class="form-control"
                                            value="{{ $settings['company_longitude'] ?? '' }}">
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
