@extends('layouts.app')
@php
    $title = "Pricing";
@endphp
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
@endsection
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} Table</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($memberships as $membership)
                        <div class="col-md-4">
                            <!-- Widget: user widget style 2 -->
                            <div class="card card-widget widget-user-2">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header @if($membership->id == 1) bg-primary @elseif ($membership->id == 2) bg-warning @else bg-danger @endif">
                                <!-- /.widget-user-image -->
                                <h3 class="widget-user-username">{{ ucfirst($membership->name) }}</h3>
                                <h5 class="widget-user-desc">{{ ucfirst($membership->name) }} Member</h5>
                            </div>
                            <div class="card-body">
                                @if ($membership->id == 1)
                                    <p>
                                        Happy Hour Car Wash! Get 20% off your car wash today from 10am to 12pm.
                                    </p>
                                    <p>
                                        Wash and Go! Get a free vacuum with every car wash today.
                                    </p>
                                    <p>
                                        Rain or Shine, Your Car Will Shine! Get a free tire shine with every car wash today, no matter the weather.
                                    </p>
                                @elseif ($membership->id == 2)
                                    <p>
                                        Sign up for a monthly membership and get your first wash free!
                                    </p>
                                    <p>
                                        Unlimited car washes for one low monthly price. Sign up today!
                                    </p>
                                    <p>
                                        Get 10% off your monthly membership when you pay for a year in advance.
                                    </p>
                                    <br>
                                @else
                                    <p>
                                        Get a free upgrade to our premium car wash package when you sign up for an annual membership.
                                    </p>
                                    <p>
                                        Unlimited car washes and free vacuuming all year long with an annual membership.
                                    </p>
                                    <p>
                                        Sign up for an annual membership and get a free gift card to your favorite gas station.
                                    </p>
                                @endif
                                <p>
                                    Interested? Join now for just IDR {{ number_format($membership->price, 0) }}
                                </p>
                                <a href="{{ route('member.register', ['id' => $membership->id]) }}" class="btn btn-success btn-block">
                                    <b>Subscribe</b>
                                </a>
                            </div>
                            </div>
                            <!-- /.widget-user -->
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
@endsection
