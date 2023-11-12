@extends('layouts.app')
@php
    $title = "Admin Add";
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
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">User</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Choose User</option>
                            <option value="{{ Auth::id() }}">{{ Auth::user()->name }}</option>
                            <option value="1">Adrian</option>
                            <option value="2">Susanti</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Role</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Choose Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputStatus">Branch</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option selected disabled>Choose Branch</option>
                            <option value="11">Tokyo</option>
                            <option value="12">Japan</option>
                            <option value="13">Australia</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save Update" class="btn btn-success float-right">
            </div>
        </div>
    </section>
</div>
@endsection
