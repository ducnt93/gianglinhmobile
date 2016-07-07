@extends('admin.master')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('flash::message')
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Phụ kiện</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('div.alert').delay(3000).slideUp();
    </script>
@endsection