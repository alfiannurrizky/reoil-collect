@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Riwayat Pengajuan</h4>
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
                            <a href="{{ route('pickup-requests.create') }}" class="btn btn-outline-success mb-3">
                                Ajukan Penjemputan
                            </a>
                            <div class="table-responsive">
                                <table class="table" id="table-bengkel">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>TANGGAL PENGAJUAN</th>
                                            <th>STATUS</th>
                                            <th>CATATAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($requests as $index => $request)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ \Carbon\Carbon::parse($request->pickup_date)->format('d M Y') }}</td>
                                                <td>
                                                    @if ($request->status === 'pending')
                                                        <span class="badge bg-warning text-dark">Menunggu</span>
                                                    @elseif ($request->status === 'approved')
                                                        <span class="badge bg-success">Disetujui</span>
                                                    @elseif ($request->status === 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-secondary">Tidak diketahui</span>
                                                    @endif
                                                </td>
                                                <td>{{ $request->notes ?? '-' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Belum ada pengajuan penjemputan.</td>
                                            </tr>
                                        @endforelse
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
