@extends('backend.master')
@section('title','City List')
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
                            <h2>City List</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                        <th>
                                            <input type="checkbox" id="check-all" class="flat">
                                        </th>
                                        <th class="column-title">Username </th>
                                        <th class="column-title">Action</th>
                                        <th class="bulk-actions" colspan="7">
                                            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cities as $city)
                                            <tr class="even pointer">
                                                <td class="a-center ">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class=" ">{{$city->name}}</td>
                                                <td class=" ">
                                                    <a href = "{{ url('admin-backend/city/edit/' .$city->id )}}" class="btn btn-info btn-sm">
                                                    <i class = "fa fa-pencil"></i>Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
