@extends('admin.layouts.master')

@section('title','Edit $news')

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

            @include('admin.layouts.partials.pageheader',['title'=>"Update: news", 'desc'=>'',$links = ['all news'=> '/myadmin/news']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update :news
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($news)->method('PATCH')->action('/myadmin/news/'.$news->id)!!}
                            <div class="form-body">

                              @include('admin.news.fields')

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