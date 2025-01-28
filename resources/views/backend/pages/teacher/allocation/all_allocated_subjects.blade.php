@extends('backend.layout.app')
@section('title',$title)
@php
    $allocationIds = session()->get('allocated_subjects')
@endphp
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
                            {{-- <div class="">
                                <a href="#" class="btn btn-sm btn-primary" id="showAllocationBtn"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Show Allocation">
                                        <i class="uil-eye"></i>
                                </a>
                            </div> --}}
                        </div>
                        {{-- <form action="" method="GET">
                            <div class="mb-4">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-4">
                                        <select name="department" id="selectDepartment" class="form-control select2 @error('department_id') border border-danger @enderror" data-toggle="select2">
                                            <option selected disabled value="null">Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : ''}}>{{ $department->name ?? '---'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <select id="selectCurriculum" name="curriculum" class="form-control select2 @error('curriculum_id') border border-danger @enderror" data-toggle="select2">
                                            <option selected disabled value="null">Select Curriculum</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <select id="selectSemester" name="semester" class="form-control select2 @error('semester_id') border border-danger @enderror" data-toggle="select2">
                                            <option selected disabled value="null">Select Semester</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-1 text-end ">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="uil-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                        <div class="row">
                            @if ($allocationSubjects->count()> 0)
                                @foreach ($allocationSubjects as $value)
                                    <div class="col-md-3">
                                        <div class="card border shadow-sm p-2">
                                            <h5 class="m-0 p-0">{{$value->subject->name ?? '---'}} ({{$value->subject->code ?? '---'}}) @if ($value->subject->is_lab == 1)
                                                <small class="badge badge-success-lighten">With Lab</small>
                                            @endif</h5>
                                            <p class="p-0 m-0"><b>Credit :</b> {{$value->subject->credit ?? '---'}}</p>
                                            <small><b>Department : </b>{{$value->subject->department->name ?? '---'}}</small>
                                            <small><b>Curriculum : </b>{{$value->subject->curriculum->name ?? '---'}}</small>
                                            <small><b>Semester : </b>{{$value->subject->semester->name ?? '---'}}</small>
                                            <small class="mt-2">
                                                @if ($value->status == 'approved')
                                                    <span class="badge badge-success-lighten">Approve</span>
                                                @elseif ($value->status == 'pending')
                                                    <span class="badge badge-warning-lighten">Pending</span>
                                                @elseif ($value->status == 'draft')
                                                    <span class="badge badge-danger-lighten">Draft</span>
                                                @endif
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="d-flex justify-content-center align-item-center">
                                    <div class="">
                                        <h4 class="text-center">No Data Found</h4>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
