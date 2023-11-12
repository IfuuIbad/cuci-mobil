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
                    <div class="col-md-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">Daily</h3>
                          <h5 class="widget-user-desc">One Time Wash</h5>
                        </div>
                        <div class="card-body">
                            <p>
                                Happy Hour Car Wash! Get 20% off your car wash today from 10am to 12pm.
                            </p>
                            <p>
                                Wash and Go! Get a free vacuum with every car wash today.
                            </p>
                            <p>
                                Rain or Shine, Your Car Will Shine! Get a free tire shine with every car wash today, no matter the weather.
                            </p>
                            <a href="#" class="btn btn-success btn-block">
                                <b>Subscribe</b>
                            </a>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
                    <div class="col-md-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-primary">
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">Monthly</h3>
                          <h5 class="widget-user-desc">Monthly Member</h5>
                        </div>
                        <div class="card-body">
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
                            <a href="#" class="btn btn-success btn-block">
                                <b>Subscribe</b>
                            </a>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
                    <div class="col-md-4">
                      <!-- Widget: user widget style 2 -->
                      <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-danger">
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">Annual</h3>
                          <h5 class="widget-user-desc">Annually Member</h5>
                        </div>
                        <div class="card-body">
                            <p>
                                Get a free upgrade to our premium car wash package when you sign up for an annual membership.
                            </p>
                            <p>
                                Unlimited car washes and free vacuuming all year long with an annual membership.
                            </p>
                            <p>
                                Sign up for an annual membership and get a free gift card to your favorite gas station.
                            </p>
                            <a href="#" class="btn btn-success btn-block">
                                <b>Subscribe</b>
                            </a>
                        </div>
                      </div>
                      <!-- /.widget-user -->
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
</div>
@endsection
