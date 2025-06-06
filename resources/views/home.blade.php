@extends('layouts.template_default')

@section('content')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            @if (auth()->user()->role == 'admin')
                                <h3>Selamat datang, {{ auth()->user()->name }}!</h3>
                                <p>Ini adalah panel admin untuk mengelola pengaturan website dan data bengkel.</p>
                            @else
                                <h3>Selamat datang, {{ auth()->user()->name }}!</h3>
                                <p>Ini adalah panel owner bengkel untuk mengajukan penjemputan oli.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @if (auth()->user()->role == 'admin')
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldSetting"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Data Bengkel</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalBengkel }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldMessage"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Pesan Masuk</h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalInbox }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            @if (auth()->user()->role == 'admin')
                {!! $chart->container() !!}
                <script src="{{ $chart->cdn() }}"></script>
                {!! $chart->script() !!}
            @endif
    </section>
@endsection
