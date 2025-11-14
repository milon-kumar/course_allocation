@extends('backend.layout.app')
@section('title',$title)

@section('content')
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-12">
                <h3 class="mb-4">{{ $title }}</h3>
            </div>
        </div>

        <div class="row">

            @forelse($allocations as $allocation)
                @php
                    $subject = $allocation->subject;
                    $user = $allocation->user;
                @endphp

                <div class="col-md-12 mb-4">
                    <div class="card shadow border-0" style="border-left: 5px solid #3b82f6;">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-start">

                                {{-- LEFT SIDE: Teacher Info --}}
                                <div class="d-flex gap-3">

                                    {{-- Teacher Avatar --}}
                                    <div>
                                        <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                                             style="width:60px; height:60px; font-size:22px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="mb-1">{{ $user->name }}</h5>
                                        <small class="text-muted d-block">{{ $user->email }}</small>
                                        <small class="text-muted d-block">
                                            Position: <strong>{{ $user->position }}</strong>
                                        </small>
                                        <small class="text-muted d-block">
                                            Priority: <strong>{{ $user->priority }}</strong>
                                        </small>
                                    </div>
                                </div>

                                {{-- RIGHT SIDE: Status --}}
                                <div>
                                    @if ($allocation->status == 'approved')
                                        <span class="badge bg-success px-3 py-2">Approved</span>
                                    @elseif ($allocation->status == 'pending')
                                        <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                    @else
                                        <span class="badge bg-danger px-3 py-2">Draft</span>
                                    @endif
                                </div>

                            </div>

                            <hr>

                            {{-- Subject Info --}}
                            <div class="mt-2">
                                <h6 class="text-primary mb-1">{{ $subject->name }}</h6>
                                <div class="text-muted small">
                                    Code: <strong>{{ $subject->code }}</strong> |
                                    Credit: <strong>{{ $subject->credit }}</strong> |
                                    Department: <strong>{{ $subject->department->name }}</strong> |
                                    Curriculum: <strong>{{ $subject->curriculum->name }}</strong> |
                                    Semester: <strong>{{ $subject->semester->name }}</strong>
                                </div>

                                @if($subject->is_lab)
                                    <span class="badge bg-success mt-2">Includes Lab</span>
                                @endif
                            </div>

                            {{-- Actions --}}
                            <div class="mt-4 text-end">
                                @if($allocation->status != 'approved')
                                    <a href="{{ route('admin.approveAllocationSubject', $allocation->id) }}"
                                       class="btn btn-sm btn-success px-4">
                                        Approve
                                    </a>

                                    <button class="btn btn-sm btn-danger px-4 draft-button"
                                            data-subject-id="{{ $allocation->id }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#draftModal">
                                        Draft
                                    </button>
                                @else
                                    <span class="text-muted">No Action Available</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-12 text-center mt-4">
                    <h4>No Allocations Found</h4>
                </div>
            @endforelse

        </div>
    </div>

    {{-- Draft Reason Modal --}}
    <div id="draftModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="{{ route('admin.draftAllocationSubject') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Draft Reason</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <label class="form-label">Why keep in draft?</label>
                        <textarea class="form-control" name="note" rows="5" required></textarea>
                        <input type="hidden" name="subject_id" id="subject-id">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary px-4" type="submit">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.draft-button').on('click', function() {
                $('#subject-id').val($(this).data('subject-id'));
            });
        });
    </script>
@endsection
