@extends('backend.layout.app')
@section('title',$title)
@php
    $allocationIds = session()->get('allocated_subjects')
@endphp
@section('style')
    <style>
        .table-responsive {
            overflow: visible !important;
        }

        .table-responsive .dropdown {
            position: static !important;
        }
    </style>
@endsection

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
                            @forelse ($allocations as $subjectId => $teachers)
                                @php
                                    $subject = $teachers[0]->subject ?? null;
                                @endphp
                                <div class="col-md-12 mb-4">
                                    <div class="card border shadow-sm">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">{{ $subject->name ?? 'Unknown Subject' }}
                                                @if ($subject && $subject->is_lab)
                                                    <small class="badge bg-success text-white">With Lab</small>
                                                @endif
                                            </h5>
                                            <small class="text-muted d-block">
                                                Code: {{ $subject->code ?? '---' }} |
                                                Credit: {{ $subject->credit ?? '---' }} |
                                                Department: {{ $subject->department->name ?? '---' }} |
                                                Curriculum: {{ $subject->curriculum->name ?? '---' }} |
                                                Semester: {{ $subject->semester->name ?? '---' }}
                                            </small>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered mb-0 align-middle">
                                            <thead class="table-light">
                                            <tr>
                                                <th width="5%">#</th>
                                                <th>Teacher Name</th>
                                                <th>Email</th>
                                                <th>Position</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($teachers as $index => $allocation)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $allocation->user->name ?? '---' }}</td>
                                                    <td>{{ $allocation->user->email ?? '---' }}</td>
                                                    <td>{{ $allocation->user->position ?? '---' }}</td>
                                                    <td>{{ $allocation->user->priority ?? '---' }}</td>
                                                    <td>
                                                        @if ($allocation->status == 'approved')
                                                            <span class="badge bg-success">Approved</span>
                                                        @elseif ($allocation->status == 'pending')
                                                            <span class="badge bg-warning text-dark">Pending</span>
                                                        @elseif ($allocation->status == 'draft')
                                                            <span class="badge bg-danger">Draft</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ route('admin.approveAllocationSubject', $allocation->id) }}"
                                                               class="btn btn-sm btn-success">
                                                                Approve
                                                            </a>

                                                            <button class="btn btn-sm btn-danger draft-button"
                                                                    data-subject-id="{{ $allocation->id }}"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#signup-modal">
                                                                Draft
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 text-center">
                                    <h4>No Allocations Found</h4>
                                </div>
                            @endforelse
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
