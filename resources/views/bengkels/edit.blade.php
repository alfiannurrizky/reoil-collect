@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Bengkel {{ $bengkel->name }}</h4>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('bengkels.update', $bengkel->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="modal-body">

                                    <label for="name-{{ $bengkel->id }}">Nama Bengkel: <span
                                            style="color: red;">*</span></label>
                                    <div class="form-group">
                                        <input id="name-{{ $bengkel->id }}" type="text" name="name"
                                            class="form-control" value="{{ old('name', $bengkel->name) }}" required>
                                    </div>

                                    <label for="address-{{ $bengkel->id }}">Alamat: <span
                                            style="color: red;">*</span></label>
                                    <div class="form-group">
                                        <textarea id="address-{{ $bengkel->id }}" name="address" class="form-control" rows="3" required>{{ old('address', $bengkel->address) }}</textarea>
                                    </div>

                                    <label for="phone-{{ $bengkel->id }}">Telepon: <span
                                            style="color: red;">*</span></label>
                                    <div class="form-group">
                                        <input id="phone-{{ $bengkel->id }}" type="text" name="phone"
                                            class="form-control" value="{{ old('phone', $bengkel->phone) }}" required>
                                    </div>

                                    <label for="description-{{ $bengkel->id }}">Deskripsi:</label>
                                    <div class="form-group">
                                        <textarea id="description-{{ $bengkel->id }}" name="description" class="form-control" rows="3">{{ old('description', $bengkel->description) }}</textarea>
                                    </div>

                                    <label for="location">Lokasi Bengkel:</label>
                                    <div id="editBengkelMap" class="map rounded w-100"
                                        data-coords='[{{ $bengkel->latitude }}, {{ $bengkel->longitude }}]' data-zoom="15"
                                        data-name="{{ $bengkel->name }}" data-mode="edit-bengkel" style="height: 400px;">
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="hidden" id="latitude" name="latitude" class="form-control"
                                            value="{{ $bengkel->latitude }}" required>
                                        <input type="hidden" id="longitude" name="longitude" class="form-control"
                                            value="{{ $bengkel->longitude }}" required>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
