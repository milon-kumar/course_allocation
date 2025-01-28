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
                                <h4 class="header-title">{{ $title }} - <small>{{ $teachers->count() }}</small></h4>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.teacher.create')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Create Teacher">
                                    <i class=" uil-plus-circle"></i>
                                </a>
                            </div>
                        </div>


                        <div class="row mb-3">
                            @foreach ($teachers as $teacher)
                                <div class="col-md-4">
                                    <div class="card shadow-sm border border-secondery">
                                        <div class="card-body">
                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end" style="">
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        <span class="btn btn-sm btn-primary  d-block">
                                                            Edit
                                                        </span>
                                                    </a>
                                                    <a href="javascript:void(0);" class="dropdown-item">
                                                        <span class="btn btn-sm btn-danger d-block">
                                                            Delete
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>

                                            <span class="float-start m-2 me-4">
                                                <img src="{{asset('/')}}assets/backend/images/users/avatar-2.jpg" style="height: 100px;" alt="{{ $teacher->name ?? 'Teacher Name'}}" class="rounded-circle img-thumbnail">
                                            </span>
                                            <div class="">
                                                <h4 class="mt-1 mb-1">{{ $teacher->name ?? 'Teacher Name'}}</h4>
                                                <p class="font-12 p-0 m-0"> {{ $teacher->email ?? 'teacheremail@example.com'}}</p>
                                                <p class="font-12 p-0 m-0"> {{ $teacher->phone ?? '*** **** ** **' }}</p>

                                                <ul class="mb-0 list-inline">
                                                    <li class="list-inline-item me-3">
                                                        <h5 class="mb-1">Position</h5>
                                                        <p class="mb-0 font-13">{{ $teacher->position ?? 'Teacher DEG'}}</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <h5 class="mb-1">Priority</h5>
                                                        <p class="mb-0 font-13">{{ $teacher->priority ?? 'Teacher PRIO' }}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                {{ $teachers->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
