@extends('backend.master')
@section('title','Site Setting')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row" style="display: block;">
                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User List</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings text-center">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">Point </th>
                                        <th class="column-title">Company Name </th>
                                        <th class="column-title">Company Logo </th>
                                        <th class="column-title">Company Email </th>
                                        <th class="column-title">Company Phone </th>
                                        <th class="column-title">Company Address </th>
                                        <th class="column-title">Action</th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">{{$setting->point}}</td>
                                            <td class=" ">{{$setting->company_name}}</td>
                                            <td class=" ">{{$setting->company_logo}}</td>
                                            <td class=" ">{{$setting->company_email}}</td>
                                            <td class=" ">{{$setting->company_phone}}</td>
                                            <td class=" ">{{$setting->company_address}}</td>
                                            <td class=" ">
                                                <a href = "{{ url('admin-backend/setting/edit/')}}" class="btn btn-info btn-sm">
                                                    <i class = "fa fa-pencil"></i>Edit
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section('javascript')
    @if($errors->has('name'))
        <script> 
            new PNotify({
            title: 'Oh No!',
            text: "{{ $errors->first('name')}}",
            type: 'error',
            styling: 'bootstrap3'
            });
        </script>
    @endif
@endsection
