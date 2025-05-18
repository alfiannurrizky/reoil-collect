@extends('layouts.template_default')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Pesan Masuk</h4>
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
                            <div class="table-responsive">
                                <table class="table" id="table-kontak">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th>TELEPON</th>
                                            <th>PESAN</th>
                                            <th>TANGGAL</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesan as $index => $p)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->email }}</td>
                                                <td>{{ $p->phone }}</td>
                                                <td>{{ $p->message }}</td>
                                                <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                                                <td>
                                                    <form action="{{ route('kontak.destroy', $p->id) }}" method="POST"
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Yakin mau hapus pesan ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="mt-4">
                                    {{ $pesan->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
