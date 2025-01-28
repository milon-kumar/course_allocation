@extends('backend.layout.app')
@section('title',$title)


@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 border-b d-flex justify-content-between align-items-center">
                            <div class="">
                                <h4 class="header-title">{{ $title }}</h4>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.subjectManage',$semesterId)}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="All Subject">
                                    <i class=" uil-arrow-left"></i>
                                </a>
                            </div>
                        </div>

                        <form method="POST" action="{{route('admin.subjectStore',$semesterId)}}">
                            @csrf
                            <div class="mb-2 row">
                                <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('name') border border-danger @enderror"
                                    id="name"
                                    placeholder="Enter Subject Name"
                                    name="name"
                                    value="{{ old('name')}}">
                                    @include('backend.components.error-message',['name'=>'name'])
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="code" class="col-sm-2 col-form-label col-form-label-sm">Code <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('code') border border-danger @enderror"
                                    id="code"
                                    placeholder="Enter Subject Code"
                                    name="code"
                                    value="{{ old('code')}}">
                                    @include('backend.components.error-message',['name'=>'code'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="credit" class="col-sm-2 col-form-label col-form-label-sm">Credit <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('credit') border border-danger @enderror"
                                    id="credit"
                                    placeholder="Enter Subject Credit"
                                    name="credit"
                                    value="{{ old('credit')}}">
                                    @include('backend.components.error-message',['name'=>'credit'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="credit" class="col-sm-2 col-form-label col-form-label-sm">With Lab</label>
                                <div class="col-sm-10">
                                    <div class="d-flex gap-5">
                                        <div class="form-check form-switch ">
                                            <input name="is_lab" type="checkbox" id="switch3" checked data-switch="primary"/>
                                            <label for="switch3" data-on-label="Yes" data-off-label="No "></label>
                                        </div>
                                        <div class="">
                                            <label class="form-check-label" for="switch3" style="cursor: pointer">If Check The Button Then The Subject Is Make As a With Lab</label>
                                        </div>
                                    </div>
                                    @include('backend.components.error-message',['name'=>'credit'])
                                </div>
                            </div>
                            <div class="mb-2 text-end">
                                <button type="submit" class="btn btn-primary text-end"><i class="uil-folder-plus"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

