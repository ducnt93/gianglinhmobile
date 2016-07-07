@extends('admin.master')
@section('header')
    @include('admin.common.cssViewList')
@endsection
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @include('flash::message')
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-6"><h2>Phụ kiện</h2></div>
                    <div class="col-md-6 col-sm-6 col-xs-6"><a class="btn btn-primary"
                                                               href="{!! URL::route('admin.accessories.create') !!}}"
                                                               name="themmoi"
                                                               style="float: right;"><span
                                    class="glyphicon glyphicon-plus"
                                    aria-hidden="true" style="color: white ; padding-right: 2px "></span>Thêm mới</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive"
                       class="table table-striped table-bordered dt-responsive nowrap bulk_action"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr class="headings">
                        <th>
                            <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th>Accessory Name</th>
                        <th>Price</th>
                        <th>idUnitPrice</th>
                        <th>iStatus</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($accessories as $accessory)
                        <tr>
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{$accessory->Accessoryname}}</td>
                            <td>{{$accessory->Price}}</td>
                            <td>{{$accessory->idUnitPrice}}</td>
                            <td>{{$accessory->iStatus}}</td>
                            <td>
                                <button type="button" class="btn btn-info">Xem</button>
                                <button type="button" class="btn btn-success">Cập nhật</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($accessories as $accessory)
                        <tr>
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{$accessory->Accessoryname}}</td>
                            <td>{{$accessory->Price}}</td>
                            <td>{{$accessory->idUnitPrice}}</td>
                            <td>{{$accessory->iStatus}}</td>
                            <td>
                                <button type="button" class="btn btn-info">Xem</button>
                                <button type="button" class="btn btn-success">Cập nhật</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($accessories as $accessory)
                        <tr>
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{$accessory->Accessoryname}}</td>
                            <td>{{$accessory->Price}}</td>
                            <td>{{$accessory->idUnitPrice}}</td>
                            <td>{{$accessory->iStatus}}</td>
                            <td>
                                <button type="button" class="btn btn-info">Xem</button>
                                <button type="button" class="btn btn-success">Cập nhật</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($accessories as $accessory)
                        <tr>
                            <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td>{{$accessory->Accessoryname}}</td>
                            <td>{{$accessory->Price}}</td>
                            <td>{{$accessory->idUnitPrice}}</td>
                            <td>{{$accessory->iStatus}}</td>
                            <td>
                                <button type="button" class="btn btn-info">Xem</button>
                                <button type="button" class="btn btn-success">Cập nhật</button>
                                <button type="button" class="btn btn-danger">Xóa</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.common.jsViewList')
    <script>
        $('div.alert').delay(3000).slideUp();
    </script>
@endsection
