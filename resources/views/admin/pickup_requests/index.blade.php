@extends('layouts.template_default')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pengajuan Customer Bengkel</h4>
        </div>
        <div class="card-body table-responsive">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bengkel</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $index => $pickup)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pickup->user->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($pickup->pickup_date)->format('d M Y') }}</td>
                            <td>
                                @if ($pickup->status === 'pending')
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @elseif ($pickup->status === 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($pickup->status === 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>{{ $pickup->notes ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.pickup_requests.updateStatus', $pickup->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                        <option value="">Ubah Status</option>
                                        <option value="approved">Setujui</option>
                                        <option value="rejected">Tolak</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pengajuan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
