@extends('layouts.app')
@php
    $title = "Membership Register";
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
        <form action="{{ route('member.store-regis') }}" method="post" enctype="multipart/form-data">
            @csrf
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
                            <label>Tipe Langganan</label>
                            <select class="form-control" name="membership_id" id="membership_id">
                                <option value="">-Pilih Tipe Membership -</option>
                                <option value="1" @selected($membership->id == 1)>DAILY</option>
                                <option value="2" @selected($membership->id == 2)>MONTHLY</option>
                                <option value="3" @selected($membership->id == 3)>ANNUALLY</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merk Mobil</label>
                            <input type="text" name="name" class="form-control" placeholder="Merk Mobil">
                        </div>
                        <div class="form-group">
                            <label>Nopol / plat nomor</label>
                            <input type="text" name="license_number" class="form-control" placeholder="Plat Nomor">
                        </div>
                        {{-- <div class="form-group">
                            <label>Warna Mobil</label>
                            <input type="text" name="color" class="form-control" placeholder="Warna">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputFile">Foto Mobil</label>
                                <div class="input-group">
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" accept="image/*">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('member.dashboard') }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Submit" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
