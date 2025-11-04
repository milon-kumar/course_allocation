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
                                <a href="{{ route('student.feedback.index')}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="All Department">
                                    <i class=" uil-arrow-left"></i>
                                </a>
                            </div>
                        </div>

                        <form method="POST" action="{{route('student.feedback.store')}}">
                            @csrf

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Teachers <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="selectTeacher" name="teacher_id" class="form-control select2 @error('teacher_id') border border-danger @enderror" data-toggle="select2">
                                        <option class="d-none" selected>Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{$teacher->id}}" {{ old('teacher_id') == $teacher->id ? 'selected' : ''}}>{{ $teacher->name ?? '---'}}</option>
                                        @endforeach
                                    </select>
                                    @include('backend.components.error-message',['name'=>'teacher_id'])
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Subject <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select id="selectSubject" name="subject_id" class="form-control select2 @error('subject_id') border border-danger @enderror" data-toggle="select2">
                                        <option class="d-none" selected>Select Subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{$subject->id}}" {{ old('subject_id') == $subject->id ? 'selected' : ''}}>{{ $subject->name ?? '---'}}</option>
                                        @endforeach
                                    </select>
                                    @include('backend.components.error-message',['name'=>'subject_id'])
                                </div>
                            </div>


                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Review</label>
                                <div class="col-sm-10">
                                    <textarea name="review" placeholder="Write your review" class="form-control"></textarea>
                                </div>
                            </div>

                            {{-- ⭐ Rating Field --}}
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Rating</label>
                                <div class="col-sm-10">
                                    <div id="rating-container" style="display: inline-flex; gap: 5px; cursor: pointer; font-size: 28px; color: #ccc;">
                                        @for($i = 1; $i <= 5; $i++)
                                            <div class="star" data-value="{{ $i }}"></div>
                                        @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="rating" value="0">
                                    @include('backend.components.error-message',['name'=>'rating'])
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

    {{-- ✅ Half Star Rating Script --}}
    <style>
        .star {
            position: relative;
            display: inline-block;
            width: 30px;
            height: 30px;
            background: linear-gradient(to right, #ccc 50%, #ccc 50%);
            -webkit-mask: url('data:image/svg+xml;utf8,<svg fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.75l-6 5.847L19.335 24 12 20.202 4.665 24 6 15.597 0 9.75l8.332-1.732z"/></svg>') center / contain no-repeat;
            mask: url('data:image/svg+xml;utf8,<svg fill="black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.431L24 9.75l-6 5.847L19.335 24 12 20.202 4.665 24 6 15.597 0 9.75l8.332-1.732z"/></svg>') center / contain no-repeat;
            transition: background 0.2s ease;
        }
        .star.filled {
            background: linear-gradient(to right, #FFD700 50%, #ccc 50%);
        }
        .star.full {
            background: #FFD700;
        }
    </style>

    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');

        stars.forEach((star, index) => {
            star.addEventListener('mousemove', (e) => {
                const rect = star.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const isHalf = x < rect.width / 2;
                const currentRating = index + (isHalf ? 0.5 : 1);
                fillStars(currentRating);
            });

            star.addEventListener('mouseleave', () => {
                fillStars(parseFloat(ratingInput.value));
            });

            star.addEventListener('click', (e) => {
                const rect = star.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const isHalf = x < rect.width / 2;
                const selectedRating = index + (isHalf ? 0.5 : 1);
                ratingInput.value = selectedRating;
                fillStars(selectedRating);
            });
        });

        function fillStars(rating) {
            stars.forEach((star, index) => {
                const starValue = index + 1;
                if (rating >= starValue) {
                    star.classList.add('full');
                    star.classList.remove('filled');
                } else if (rating + 0.5 === starValue) {
                    star.classList.add('filled');
                    star.classList.remove('full');
                } else {
                    star.classList.remove('full', 'filled');
                }
            });
        }
    </script>
@endsection
