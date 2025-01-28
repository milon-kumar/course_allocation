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
                                <a href="{{ route('admin.teacher.index')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="All Teachers">
                                    <i class=" uil-arrow-left"></i>
                                </a>
                            </div>
                        </div>


                        <form method="POST" action="{{route('admin.teacher.store')}}" enctype="multipart/form-data">
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
                                    placeholder="Enter Teacher Name"
                                    name="name"
                                    value="{{ old('name')}}">
                                    @include('backend.components.error-message',['name'=>'name'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email"
                                    class="form-control form-control-sm @error('email') border border-danger @enderror"
                                    id="email"
                                    placeholder="Enter Teacher Email"
                                    name="email"
                                    value="{{ old('email')}}">
                                    @include('backend.components.error-message',['name'=>'email'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="phone" class="col-sm-2 col-form-label col-form-label-sm">Phone Number </label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('phone') border border-danger @enderror"
                                    id="phone"
                                    placeholder="Enter Teacher Phone Number"
                                    name="phone"
                                    value="{{ old('phone')}}">
                                    @include('backend.components.error-message',['name'=>'phone'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="priority" class="col-sm-2 col-form-label col-form-label-sm">Priority <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="number" id="priority" name="priority" value="{{old('priority')}}" class="form-control @error('priority') border border-danger @enderror" placeholder="Enter your priority">
                                        <div class="input-group-text" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#info-alert-modal">
                                            <span class="uil-comment-info"></span>
                                        </div>
                                    </div>
                                    @include('backend.components.error-message',['name'=>'priority'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="position" class="col-sm-2 col-form-label col-form-label-sm">Position <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('position') border border-danger @enderror"
                                    id="position"
                                    placeholder="Enter Teacher Position"
                                    name="position"
                                    value="{{ old('position')}}">
                                    @include('backend.components.error-message',['name'=>'position'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="example-fileinput" class="col-sm-2 col-form-label col-form-label-sm">Profile Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" id="example-fileinput" class="form-control">
                                    @include('backend.components.error-message',['name'=>'image'])
                                </div>
                            </div>

                            <hr class="my-4 border border-secondery">

                            <div class="mb-2 row">
                                <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="password"
                                    class="form-control form-control-sm @error('password') border border-danger @enderror"
                                    id="password"
                                    placeholder="Enter Teacher Passwrod"
                                    name="password">
                                    @include('backend.components.error-message',['name'=>'password'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="password"
                                    class="form-control form-control-sm @error('password') border border-danger @enderror"
                                    id="password"
                                    placeholder="Enter Passwrod Again"
                                    name="password_confirmation">
                                    @include('backend.components.error-message',['name'=>'password_confirmation'])
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

    <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-information h1 text-info"></i>
                        <h4 class="mt-2">Priority Info</h4>
                        <p class="mt-3">Please Given Here Priority for given access for select subject form teachers... !!</p>
                        <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

