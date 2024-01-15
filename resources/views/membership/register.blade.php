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
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-6">
                            <h3 class="card-title">
                                {{ $title }}
                            </h3>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="#membership" class="nav-link active" data-toggle="tab">
                                        Register Membership
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#car" class="nav-link" data-toggle="tab">
                                        Register Car
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="membership" class="tab-pane active">
                                <form action="{{ route('member.store-regis') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Mobil</label>
                                        <select class="form-control" name="car_id" id="car_id">
                                            <option value="">-Pilih Mobil -</option>
                                            @foreach ($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                                        <label>Harga Langganan</label>
                                        <input type="text" name="membership_price" id="membership_price" class="form-control" placeholder="Harga Langganan" value="{{ $membership->price }}" readonly/>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('member.dashboard') }}" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Submit" class="btn btn-success float-right" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="car" class="tab-pane">
                                <form action="{{ route('car.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Merk Mobil</label>
                                        <input type="text" name="name" class="form-control" placeholder="Merk Mobil" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nopol / plat nomor</label>
                                        <input type="text" name="license_number" class="form-control" placeholder="Plat Nomor" />
                                    </div>
                                    <div class="form-group">
                                        <label>Warna Mobil</label>
                                        <input type="text" name="color" class="form-control" placeholder="Warna" />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Foto Mobil</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile" accept="image/*" />
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('member.dashboard') }}" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Submit" class="btn btn-success float-right" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>

<script>
    var baseUrl = "{{ url('/') }}";

    document.getElementById('membership_id').addEventListener('change', function () {
        var selectedMembershipId = this.value;
        console.log(selectedMembershipId);

        // Update the URL based on the selected membership type
        var newUrl = baseUrl + "/membership/register/" + selectedMembershipId;
        window.history.replaceState({}, document.title, newUrl);
        window.location.reload();
    });
</script>

@endsection
