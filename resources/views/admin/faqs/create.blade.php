@extends('admin.layouts.master')

@section('title','Create  faq')

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

            @include('admin.layouts.partials.pageheader',['title'=>'Create faqs', 'desc'=>'Create faq',$links = ['all faqs'=> '/myadmin/faqs']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Create New faq
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::horrizontal_open()->method('Post')->action('myadmin/faqs')!!}
                            <div class="form-body">

                                @include('admin.faqs.fields')
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