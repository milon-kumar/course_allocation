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
                            @if ($allocations->count()> 0)
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover table-bordered table-striped">
                                    <tr>
                                        <th># SL</th>
                                        <th>Teacher Details</th>
                                        <th>Course Details</th>
                                        <th>Current Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($allocations as $value)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="">
                                                    <h5 class="p-0 m-0">{{ $value->user->name}}</h6>
                                                    <p class="p-0 m-0">Email : {{$value->user->email ?? ''}}</p>
                                                    @if ($value->user->phone)
                                                        <p class="p-0 m-0">Email : {{$value->user->phone ?? ''}}</p>
                                                    @endif
                                                    <p class="p-0 m-0">
                                                        <small class="p-0 m-0">
                                                            <b>Position : {{$value->user->position ?? '---'}}</b>
                                                        </small>
                                                    </p>
                                                    @if ($value->user->department )
                                                        <small class="m-0 p-0">
                                                            <b>Department : </b> {{ $value->user->department->name ?? '---  '}}
                                                        </small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                               <div class="">
                                                    <p class="m-0 p-0">{{ $value->subject->name ?? '---'}} @if ($value->subject->is_lab == 1)<small class="badge badge-success-lighten">With Lab</small>@endif</p>
                                                    <p class="m-0 p-0">
                                                        <small>
                                                            <b>Code :</b>
                                                            {{$value->subject->code ?? '---'}}
                                                        </small>
                                                    </p>
                                                    <p class="m-0 p-0">
                                                        <small>
                                                            <b>Credit :</b>
                                                            {{$value->subject->credit ?? '---'}}
                                                        </small>
                                                    </p>
                                                    <p class="m-0 p-0">
                                                        <small>
                                                            <b>Department :</b>
                                                            {{$value->subject->department->name ?? '---'}}
                                                        </small>
                                                    </p>
                                                    <p class="m-0 p-0">
                                                        <small>
                                                            <b>Curriculum:</b>
                                                            {{$value->subject->curriculum->name ?? '---'}}
                                                        </small>
                                                    </p>
                                                    <p class="m-0 p-0">
                                                        <small>
                                                            <b>Semester:</b>
                                                            {{$value->subject->semester->name ?? '---'}}
                                                        </small>
                                                    </p>
                                               </div>
                                            </td>
                                            <td>
                                                @if ($value->status == 'approved')
                                                    <span class="badge badge-success-lighten">Approve</span>
                                                @elseif ($value->status == 'pending')
                                                    <span class="badge badge-warning-lighten">Pending</span>
                                                @elseif ($value->status == 'draft')
                                                    <span class="badge badge-danger-lighten">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle arrow-none card-drop " data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="mdi mdi-dots-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end " data-popper-placement="top-end" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(-140px, -28.7812px);">
                                                        <a href="{{route('admin.approveAllocationSubject',$value->id)}}" class="dropdown-item">Approve</a>
                                                        <a class="dropdown-item draft-button" data-subject-id="{{ $value->id }}" type="button" data-bs-toggle="modal" data-bs-target="#signup-modal">Draft</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
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

    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Draft Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="ps-3 pe-3" action="{{ route('admin.draftAllocationSubject') }}" method="POST">
                        <div class="mb-3">
                            <label for="note" class="form-label">Why do you want to keep it in the draft?</label>
                            <textarea class="form-control" name="note" id="note" rows="7" required
                                placeholder="Write a draft note..."></textarea>
                        </div>
                        <input type="hidden" name="subject_id" id="subject-id" value="">
                        <div class="mb-3 text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.draft-button').on('click', function() {
                var subjectId = $(this).data('subject-id');
                $('#subject-id').val(subjectId);
            });
        });
    </script>
@endsection
