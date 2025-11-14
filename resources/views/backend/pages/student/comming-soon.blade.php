@extends('backend.layout.app')
@section('title', "Coming Soon")

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center mt-5" style="min-height: 75vh;">
            <div class="col-md-7 col-lg-5 text-center">

                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffffd9; backdrop-filter: blur(4px);">

                    <div class="mb-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/8140/8140595.png"
                             alt="Coming Soon"
                             style="height: 120px;"
                        >
                    </div>

                    <h2 class="fw-bold mb-2 text-primary">
                        🚧 Coming Soon
                    </h2>

                    <p class="text-muted mb-4" style="font-size: 15px;">
                        We're working hard to bring you something amazing!
                        Stay tuned — this feature will be available shortly.
                    </p>

                    <div class="progress mb-3" style="height: 10px;">
                        <div
                            class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                            role="progressbar" style="width: 65%">
                        </div>
                    </div>

                    <p class="small text-muted">65% Completed</p>

                    <button class="btn btn-primary rounded-pill px-4 mt-2">
                        <i class="mdi mdi-bell-ring-outline me-1"></i> Notify Me
                    </button>

                </div>

            </div>
        </div>
    </div>
@endsection
