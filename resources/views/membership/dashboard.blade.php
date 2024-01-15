@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                        <h3 class="card-title">List Mobil Langganan</h3>

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
                            <th>Mobil</th>
                            <th>Item</th>
                            <th>Status</th>
                            <th>expired_at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cars as $car)
                                    <tr>
                                        <td><a href="{{route('member.car.detail', $car)}}">{{ $car->name }}</a></td>
                                        <td>{{ (@$car->memberships[sizeof($car->memberships) -1]->name)? $car->memberships[sizeof($car->memberships) -1]->name : 'never join membership yet' }}</td>
                                        <td><span class="badge {{ $car->exp_membership > \Carbon\Carbon::now() ? 'badge-success' : 'badge-warning' }}">{{ $car->exp_membership > \Carbon\Carbon::now() ? 'active' : 'expired' }}</span></td>
                                        <td>
                                            {{ (@$car->memberships[sizeof($car->memberships) -1]->name)? \Carbon\Carbon::createFromDate($car->exp_membership)->format('j F Y') : 'never join membership yet' }}
                                        </td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ route('member.price-list') }}" class="btn btn-sm btn-info float-right">Place New Order</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
