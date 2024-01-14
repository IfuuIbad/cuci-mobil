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
                        <h3 class="card-title">Membership Report</h3>
                        {{-- <a href="javascript:void(0);">View Report</a> --}}
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                        <span class="text-bold text-lg">{{ $activeCars + $expiredCars }}</span>
                        <span>Total Membership</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 2
                        </span>
                        <span class="text-muted">Since last week</span>
                        </p>
                    </div>
                    <!-- /.d-flex -->

                    <div class="position-relative mb-4">
                        <canvas id="membership-chart" height="200"></canvas>
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
                            {{-- <a href="javascript:void(0);">View Report</a> --}}
                        </div>
                        </div>
                        <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                            <span class="text-bold text-lg">@currency($totalAll)</span>
                            <span>Sales Over Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            {{-- <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 33.1%
                            </span>
                            <span class="text-muted">Since last month</span> --}}
                            </p>
                        </div>
                        <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- <div class="row">
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
                        <th>Car</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th>Expired At</th>
                        <th>More</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($memberships as $membership)
                                <tr>
                                    <td>
                                        <img src="{{ Avatar::create($membership->user->name)->toBase64() }}" alt="member img" class="img-circle img-size-32 mr-2">
                                        {{ $membership->user->name }}
                                    </td>
                                    <td>{{ $membership->name }}</td>
                                    @foreach ($membership->memberships()->get() as $membership)
                                        <td>Membership {{ $membership->name }}</td>
                                    @endforeach
                                    <td>
                                        <span class="badge {{ $membership->exp_membership > \Carbon\Carbon::now() ? 'badge-success' : 'badge-warning' }}">{{ $membership->exp_membership > \Carbon\Carbon::now() ? 'active' : 'expired' }}</span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::createFromDate($membership->exp_membership)->format('jS F Y') }}
                                    </td>
                                    <td>
                                        <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('membership-chart').getContext('2d');
        var stx = document.getElementById('sales-chart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Active Cars', 'Expired Cars'],
                datasets: [{
                    label: 'Active Cars',
                    data: [
                        {{ $activeCars }},
                        {{ $expiredCars }}
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var salesChart = new Chart(stx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'March', 'April', 'May', 'Jun', 'Jul'], // Labels from the image
                datasets: [{
                    label: 'This Year',
                    data: [{{ $totalJan }}, {{ $totalFeb }}, {{ $totalMarch }}, {{ $totalAppril }}, {{ $totalMay }}, {{ $totalJun }}, {{ $totalJul }}], // Data values for this year
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                }, {
                    label: 'Last Year',
                    data: [0, 100000, 100000, 100000, 100000, 100000, 100000], // Data values for last year
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
