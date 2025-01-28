<div class="block-header">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>{{ $title }}</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ role() == 'admin' ? route('admin.dashboard') : route('teacher.dashboard') }}"><i class="zmdi zmdi-home"></i> {{env('APP_NAME')}}</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ul>
            <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
        </div>
    </div>
</div>
