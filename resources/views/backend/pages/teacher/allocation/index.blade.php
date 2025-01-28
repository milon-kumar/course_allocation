@extends('backend.layout.app')
@section('title',$title)
@section('style')
    <style>
        .subject-card{
            position: relative;
            cursor: pointer;
        }
        .form-check-input{
            position: absolute;
            top: 10px;
            left: 338px;
            bottom: 0;
            right: 0px;
            z-index: 1;
        }
        .form-check-label{
            display: block;
        }
    </style>
@endsection
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
                            <div class="">
                                <a href="#" class="btn btn-sm btn-primary" id="showAllocationBtn"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Show Allocation">
                                        <i class="uil-eye"></i>
                                </a>
                            </div>
                        </div>
                        <form action="" method="GET">
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
                        </form>
                        <div class="row">
                            @foreach ($subjects as $subject)
                                <a href="{{route("teacher.addAllocatedSubject",$subject->id) }}" class="col-md-3">
                                    <div class="card border @if ($allocationIds) {{ in_array($subject->id, $allocationIds) ? 'border-success' : 'border-light' }} @endif  shadow-sm text-white">
                                        <div class="card-body">
                                            <h5 class="m-0 p-0">{{$subject->name ?? '---'}}</h5>
                                            <p class="p-0 m-0"><b>Credit :</b> {{$subject->credit ?? '---'}}</p>
                                            <p class="p-0 m-0"><small><b>Department : </b>{{$subject->department->name ?? '---'}}</small></p>
                                            <p class="p-0 m-0"><small><b>Curriculum : </b>{{$subject->curriculum->name ?? '---'}}</small></p>
                                            <p class="p-0 m-0"><small><b>Semester : </b>{{$subject->semester->name ?? '---'}}</small></p>

                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Allocated Subjects</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" id="allocatedList"></div>
        <div class="p-3">
            <a href="{{ route('teacher.storeAllocatedSubjects')}}" class="btn btn-primary text-end"><i class="uil-folder-plus"></i> Submit</a>
            <a href="{{ route('teacher.clearAllocatedSubjects')}}" class="btn btn-danger text-end"><i class=" uil-refresh"></i> Clear</a>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document.body).on("change", "#selectDepartment", async (event) => {
            console.log("selectDepartment")
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

        $(document.body).on("change", "#selectCurriculum", async (event) => {
            console.log("selectCurriculum")
            const selectedValue = event.target.value;
            try {
                const response = await fetch(`/curriculum/${selectedValue}/semesters`);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();
                $('#selectSemester').empty("");
                $('#selectSemester').append(`<option selected disabled value="null">Select Semster</option>`);
                $.each(data, function(index, item) {
                    var newOption = new Option(item.name, item.id, false, false);
                    $('#selectSemester').append(newOption);
                });
                $('#selectSemester').trigger('change');
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        });

        $(document).ready(function () {
            // Add an event listener for the offcanvas show event
            $('#offcanvasRight').on('show.bs.offcanvas', function () {
            // Fetch data from the API
            fetchAllocatedSubjects();
        });

        function fetchAllocatedSubjects() {
            // Use jQuery's $.getJSON to call the endpoint
            $.getJSON('{{ route('teacher.allocatedSubjects') }}')
                .done(function (data) {
                    console.log(data);
                    renderAllocatedSubjects(data);
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching allocated subjects:', errorThrown);
                });
        }

        function renderAllocatedSubjects(subjects) {
            const $allocatedList = $('#allocatedList');
            $allocatedList.empty();

            if (subjects.length === 0) {
                $allocatedList.append('<h4 class="mt-5 text-center">Data Not Found</h4>');
                return;
            }

            subjects.forEach(subject => {
                const $listItem = `
                <div class="card border mb-2 p-2">
                    <h5 class="m-0 p-0">${subject?.name ?? '---'} (${subject?.code ?? '---'}) ${subject?.is_lab === 1 ? '<small class="badge badge-success-lighten">With Lab</small>':'' }</h5>
                    <p class="p-0 m-0"><b>Credit :</b> ${subject?.credit ?? '---'}</p>
                    <small><b>Department : </b>${subject?.department?.name ?? '---'}</small>
                    <small><b>Curriculum : </b>${subject?.curriculum?.name ?? '---'}</small>
                    <small><b>Semester : </b>${subject?.semester?.name ?? '---'}</small>
                </div>
                `
                $allocatedList.append($listItem);
            });
        }
    </script>
@endsection
