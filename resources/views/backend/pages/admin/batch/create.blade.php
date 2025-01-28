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
                                <a href="{{ route('admin.batch.index')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="All Batch">
                                    <i class=" uil-arrow-left"></i>
                                </a>
                            </div>
                        </div>


                        <form method="POST" action="{{route('admin.batch.store')}}">
                            @csrf
                            <div class="mb-2 row">
                                <label for="selectDepartment" class="col-sm-2 col-form-label col-form-label-sm">Department <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="selectDepartment" name="department_id" class="form-control select2 @error('department_id') border border-danger @enderror" data-toggle="select2">
                                        <option selected disabled>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : ''}}>{{ $department->name ?? '---'}}</option>
                                        @endforeach
                                    </select>
                                    @include('backend.components.error-message',['name'=>'department_id'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="selectCurriculum" class="col-sm-2 col-form-label col-form-label-sm">Curriculum <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="selectCurriculum" name="curriculum_id" class="form-control select2 @error('curriculum_id') border border-danger @enderror" data-toggle="select2">
                                        <option selected disabled value="null">Select Curriculum</option>
                                    </select>
                                    @include('backend.components.error-message',['name'=>'curriculum_id'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="coordinator" class="col-sm-2 col-form-label col-form-label-sm">Coordinator <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="coordinator" name="coordinator" class="form-control select2 @error('coordinator') border border-danger @enderror" data-toggle="select2">
                                        <option selected disabled>Select Coordinator</option>
                                        @foreach ($teachers as $tacher)
                                            <option value="{{$tacher->id}}" {{ old('coordinator') == $tacher->id ? 'selected' : ''}}>{{ $tacher->name ?? '---'}}</option>
                                        @endforeach
                                    </select>
                                    @include('backend.components.error-message',['name'=>'coordinator'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="batchName" class="col-sm-2 col-form-label col-form-label-sm">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('name') border border-danger @enderror"
                                    id="batchName"
                                    placeholder="Enter Curriculum Name"
                                    name="name"
                                    value="{{ old('name')}}">
                                    @include('backend.components.error-message',['name'=>'name'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="batchNumber" class="col-sm-2 col-form-label col-form-label-sm">Number <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                    class="form-control form-control-sm @error('number') border border-danger @enderror"
                                    id="batchNumber"
                                    placeholder="Enter Batch Number (E-95) "
                                    name="number"
                                    value="{{ old('number')}}">
                                    @include('backend.components.error-message',['name'=>'number'])
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
