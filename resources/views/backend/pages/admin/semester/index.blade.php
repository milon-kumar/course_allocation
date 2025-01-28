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
                                <h4 class="header-title">{{ $title }} - <small>{{ $semesters->count() }}</small></h4>
                            </div>
                            <div class="">
                                <a href="{{ route('admin.semester.create')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Semester">
                                    <i class="uil-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                        <form action="" method="GET">
                            <div class="mb-4">
                                <div class="row g-2">
                                    <div class="mb-3 col-md-5">
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
                                    <div class="mb-3 col-md-3 text-end ">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="uil-filter"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Name</th>
                                    <th>Curriculum</th>
                                    <th>Department</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semesters as $semester)
                                    <tr>
                                        <td># {{$semester->id}}</td>
                                        <td>{{ $semester->name ?? '---'}}</td>
                                        <td>{{ $semester->curriculum->name ?? '---'}}</td>
                                        <td>{{ $semester->department->name ?? '---'}}</td>
                                        <td class="text-end">
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.subjectManage',$semester->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Subject"><i class="uil-plus-circle"></i></a>
                                            <a class="btn btn-primary btn-sm" href="{{route('admin.semester.edit',$semester->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="uil-comment-alt-edit"></i></a>
                                            <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('delete-form-{{$semester->id}}').submit()" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="uil-trash-alt"></i></a>
                                            <form action="{{route('admin.semester.destroy',$semester->id)}}" id="delete-form-{{$semester->id}}" method="POST">
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

@section('script')
    <script>
        $(document.body).on("change", "#selectDepartment", async (event) => {
            console.log("asdfasdf")
            const selectedValue = event.target.value;
            try {
                const response = await fetch(`/department/${selectedValue}/curriculums`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();
                $('#selectCurriculum').empty("");
                $('#selectCurriculum').append(`<option selected disabled value="null">Select Curriculum</option>`);
                $.each(data, function(index, item) {
                    var newOption = new Option(item.name, item.id, false, false);
                    $('#selectCurriculum').append(newOption);
                });
                $('#selectCurriculum').trigger('change');
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        });
    </script>
@endsection
