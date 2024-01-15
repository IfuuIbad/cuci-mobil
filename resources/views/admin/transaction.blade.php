@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1>Transaction</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Transaction</a></li>
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
                        <h3 class="card-title">Orders</h3>

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
                            <th class="text-center">invoice</th>
                            <th class="text-center">date</th>
                            <th class="text-center">Item</th>
                            <th class="text-center">income</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="text-center"><a href="{{ route('admin.transaction.detail', $transaction) }}">{{ $transaction->invoice }}</a></td>
                                    <td class="text-center">{{ \Carbon\Carbon::createFromDate($transaction->created_at)->format('j F Y') }}</a></td>
                                    {{-- @foreach ($car->memberships()->get() as $membership) --}}
                                    <td class="text-center">Membership {{ $transaction->membership->name }}</td>
                                    {{-- @endforeach --}}
                                    {{-- <td><span class="badge {{ $transaction->car->exp_membership > \Carbon\Carbon::now() ? 'badge-success' : 'badge-warning' }}">{{ $car->exp_membership > \Carbon\Carbon::now() ? 'active' : 'expired' }}</span></td>
                                    <td>
                                        {{ \Carbon\Carbon::createFromDate($car->exp_membership)->format('j F Y') }}
                                    </td> --}}
                                    <td class="text-right">@currency($transaction->total_price)</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="row">

                            <div class="col-sm-6">Total : </div>
                            <div class="col-sm-6 text-right"> <b> @currency($total_price) </b> </div>
                        </div>
                        </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div>
    </div>
@endsection
