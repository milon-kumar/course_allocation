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
                                <a href="{{ route('admin.curriculum.index')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="All Department">
                                    <i class=" uil-arrow-left"></i>
                                </a>
                            </div>
                        </div>


                        <form method="POST" action="{{route('admin.curriculum.store')}}">
                            @csrf
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Department <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="department_id" class="form-control select2 @error('department_id') border border-danger @enderror" data-toggle="select2">
                                        <option class="d-none" selected>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : ''}}>{{ $department->name ?? '---'}}</option>
                                        @endforeach
                                    </select>
                                    @include('backend.components.error-message',['name'=>'department_id'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('name') border border-danger @enderror"
                                    id="colFormLabelSm"
                                    placeholder="Enter Curriculum Name"
                                    name="name"
                                    value="{{ old('name')}}">
                                    @include('backend.components.error-message',['name'=>'name'])
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

