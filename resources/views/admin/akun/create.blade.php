@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Bengkel</h4>
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
                            <form action="{{ route('akun.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Bengkel</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                required maxlength="255" value="{{ old('name') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                maxlength="20" required value="{{ old('phone') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="description" class="form-label">Deskripsi (opsional)</label>
                                            <textarea class="form-control" id="description" name="description" rows="2">{{ old('description') }}</textarea>
                                        </div>

                                        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                                        <input type="hidden" name="longitude" id="longitude"
                                            value="{{ old('longitude') }}">

                                        <label class="form-label">Pilih Lokasi Bengkel</label>
                                        <div id="addBengkelMap" class="map" data-coords='[-7.250445, 112.768845]'
                                            data-zoom="13" data-mode="add" style="height:400px;">
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('bengkels.index') }}" type="submit"
                                            class="btn btn-warning">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
