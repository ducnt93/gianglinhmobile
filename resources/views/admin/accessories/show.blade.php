@extends('admin.master')
@section('header')
    @include('admin.common.cssViewList')
@endsection
@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Chi tiết phụ kiện:</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$accessory->Accessoryname}}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Loại phụ kiện</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">{{$accessory->IDtypeaccessory}}</div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Ảnh</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">{{$accessory->Image}}</div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Giá</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">{{$accessory->Price}}</div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Số lượng</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">{{$accessory->idUnitPrice}}</div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Trạng thái</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                @if ($accessory->iStatus === 1)
                                    Kích hoạt
                                @elseif ($accessory->iStatus === 0)
                                    Đang ẩn
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Thứ tự</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">{{$accessory->iOrder}}</div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3 col-sm-3 col-xs-3">Nội dung</div>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                {{htmlentities(html_entity_decode($accessory->Content))}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection