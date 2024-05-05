@extends('admin.layouts.master')

@section('title','Create  staff')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" href="/red/redactor.css" />
    <style>

        .redactor-editor { height: 500px; border: 1px solid grey}
    </style>

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Create staff', 'desc'=>'Create staff',$links = ['all staffs'=> '/myadmin/staff']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-12">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Create New staff
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::horrizontal_open_for_files()->method('Post')->action('myadmin/staff')!!}
                            <div class="form-body">

                                @include('admin.staff.fields')
                            </div>
                            {!! Former::close()!!}
                            @include('admin.layouts.partials.formerrors')
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- End CONTENT wrapper-->
    </div>
@stop

@section('scripts')


    <script type="text/javascript" src="/assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/red/redactor.min.js"></script>
    <script src="/red/plugins/table/table.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#mytext').redactor({
                imageUpload: '/fileupload',
                plugins: ['table']
            });
        });
    </script>

@stop