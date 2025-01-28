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
                                <h4 class="header-title">{{ $title }} - <small>{{ $subjects->count() }}</small></h4>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.subjectCreate',$semesterId)}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create Subject">
                                    <i class=" uil-plus-circle"></i>
                                </a>
                            </div>
                        </div>


                        <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    {{-- <th>Semester</th> --}}
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Credit</th>
                                    <th>Lab</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td># {{$subject->id}}</td>
                                        {{-- <td>{{ $subject->semester->name ?? '---' }}</td> --}}
                                        <td>{{ $subject->name ?? '---'}}</td>
                                        <td>{{ $subject->code ?? '---'}}</td>
                                        <td>{{ $subject->credit ?? '---'}}</td>
                                        <td>
                                            @if ($subject->is_lab == true)
                                                <input type="checkbox" id="switch3" disabled checked data-switch="success"/>
                                                <label for="switch3" data-on-label="Yes" data-off-label="Yes"></label>
                                            @else
                                                <input type="checkbox" id="switch3" disabled checked data-switch="primary"/>
                                                <label for="switch3" data-on-label="No" data-off-label="NO"></label>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.subjectEdit', ['semesterId'=>$semesterId ,'id'=>$subject->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="uil-comment-alt-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('delete-form-{{$subject->id}}').submit()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="uil-trash-alt"></i></a>
                                            <form action="{{route('admin.subjectDelete',['semesterId'=>$semesterId ,'id'=>$subject->id])}}" id="delete-form-{{$subject->id}}" method="POST">
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
