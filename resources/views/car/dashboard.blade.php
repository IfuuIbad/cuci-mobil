@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Mobil</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Mobil</a></li>
                    </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Info boxes -->
        <div class="row">
            <div class="clearfix hidden-md-up"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">List Mobil</h3>

                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                            <th>Merk Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Warna</th>
                            <th>Foto Mobil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>
                                        <a href="{{ route('member.car.detail', $car) }}">
                                            {{ $car->name }}
                                        </a>
                                    </td>
                                    <td>{{ $car->license_number }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>
                                        <img width="100" src="{{ asset('storage/cars/' . $car->image) }}" alt="{{ $car->name }} Image">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        <a href="{{ route('member.price-list') }}" class="btn btn-sm btn-info float-left">Place New Order</a>
                        <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                    </div> --}}
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
