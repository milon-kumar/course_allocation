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
                                <h4 class="header-title">{{ $title }} - <small>{{ $curriculums->count() }}</small></h4>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.curriculum.create')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create Department">
                                    <i class=" uil-plus-circle"></i>
                                </a>
                            </div>
                        </div>


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($curriculums as $curriculum)
                                    <tr>
                                        <td># {{$curriculum->id}}</td>
                                        <td>{{ $curriculum->name ?? '---'}}</td>
                                        <td>{{ $curriculum->department->name ?? '---' }}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.curriculum.edit',$curriculum->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="uil-comment-alt-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('delete-form-{{$curriculum->id}}').submit()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="uil-trash-alt"></i></a>
                                            <form action="{{route('admin.curriculum.destroy',$curriculum->id)}}" id="delete-form-{{$curriculum->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
