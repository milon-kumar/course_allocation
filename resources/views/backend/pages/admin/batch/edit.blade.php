@extends('backend.layout.app')
@section('title',$title)
@section('content')
    <section class="content">
        <div class="">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>{{ $title }}</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{  route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i> {{env('APP_NAME')}}</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header mb-3">
                                <h2>{{ $title }} Create</h2>
                                <ul class="header-dropdown">
                                    <li class="remove">
                                        <a href="{{ route('admin.department.index') }}" class="btn btn-sm btn-danger waves-effect text-white">
                                            <i class="zmdi zmdi-arrow-left text-white"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <form class="form-horizontal" action="{{ route('admin.department.store') }}" method="post">
                                    @csrf
                                    <div class="">
                                        <div class="row mb-3">
                                            <div class="col-12 col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $deprtment->name ?? old('name') }}" placeholder="Department Name">
                                                @include('backend.components.error-message',['name'=>'name'])
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn btn-primary waves-effect text-white text-right">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
