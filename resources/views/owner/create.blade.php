@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pengajuan</h4>
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
                            <form action="{{ route('pickup-requests.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="requested_date" class="form-label">Tanggal Request
                                                Penjemputan</label>
                                            <input type="date" class="form-control" id="requested_date"
                                                name="requested_date" value="{{ old('requsted_date') }}" required>
                                            @error('requested_date')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="notes" class="form-label">Catatan (Opsional)</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3" required>{{ old('notes') }}</textarea>
                                            @error('notes')
                                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary">Kirim Permintaan Jemput</button>
                                        <a href="/pickup-requests" type="submit" class="btn btn-warning">Kembali</a>
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
