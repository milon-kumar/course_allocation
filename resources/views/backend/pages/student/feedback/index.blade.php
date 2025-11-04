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
                                <h4 class="header-title">{{ $title }}
                            </div>
                            <div class="">
                                <a href="{{ route('student.feedback.create')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create Department">
                                    <i class=" uil-plus-circle"></i>
                                </a>
                            </div>
                        </div>

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Teacher</th>
                                <th>Subject</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th class="text-end">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($feedbacks as $feedback)  <tr>
                                    <td>{{ $feedback->teacher->name ?? '---'}}</td>
                                    <td>{{ $feedback->subject->name ?? '---'}}</td>
                                    <td>{{ $feedback->review ?? '---'}}</td>
                                    <td>{{ $feedback->rating ?? '---'}}</td>
                                    <td class="text-end">
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.subjectManage',$feedback->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Subject"><i class="uil-plus-circle"></i></a>
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.semester.edit',$feedback->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="uil-comment-alt-edit"></i></a>
                                        <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('delete-form-{{$feedback->id}}').submit()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="uil-trash-alt"></i></a>
                                        <form action="{{route('admin.semester.destroy',$feedback->id)}}" id="delete-form-{{$feedback->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <span>Feedback data not found</span>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
