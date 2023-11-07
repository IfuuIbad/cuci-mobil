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

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Website Visitors</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                        <span class="text-bold text-lg">820</span>
                        <span>Visitors Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="visitors-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This Week
                        </span>

                        <span>
                        <i class="fas fa-square text-gray"></i> Last Week
                        </span>
                    </div>
                    </div>
                </div>
                <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Sales</h3>
                        <a href="javascript:void(0);">View Report</a>
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                        <span class="text-bold text-lg">$18,230.00</span>
                        <span>Sales Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 33.1%
                        </span>
                        <span class="text-muted">Since last month</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                    </div>

                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This year
                        </span>

                        <span>
                        <i class="fas fa-square text-gray"></i> Last year
                        </span>
                    </div>
                    </div>
                </div>
                <!-- /.card -->

            </div>
        </div>
            <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" width="100%">
                    <div class="card-header border-0">
                    <h3 class="card-title">Membership</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                        </a>
                    </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                        <th>Member</th>
                        <th>Price</th>
                        <th>Sales</th>
                        <th>More</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>
                            <img src="{{ Avatar::create('Joko')->toBase64() }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Joko
                        </td>
                        <td>$13 USD</td>
                        <td>
                            <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            12%
                            </small>
                            12,000 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <img src="{{ Avatar::create('Garry')->toBase64() }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Garry
                        </td>
                        <td>$29 USD</td>
                        <td>
                            <small class="text-warning mr-1">
                            <i class="fas fa-arrow-down"></i>
                            0.5%
                            </small>
                            123,234 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <img src="{{ Avatar::create('Gura')->toBase64() }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Gura
                        </td>
                        <td>$1,230 USD</td>
                        <td>
                            <small class="text-danger mr-1">
                            <i class="fas fa-arrow-down"></i>
                            3%
                            </small>
                            198 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <img src="{{ Avatar::create('Zeta')->toBase64() }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                            Zeta
                            <span class="badge bg-danger">NEW</span>
                        </td>
                        <td>$199 USD</td>
                        <td>
                            <small class="text-success mr-1">
                            <i class="fas fa-arrow-up"></i>
                            63%
                            </small>
                            87 Sold
                        </td>
                        <td>
                            <a href="#" class="text-muted">
                            <i class="fas fa-search"></i>
                            </a>
                        </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
