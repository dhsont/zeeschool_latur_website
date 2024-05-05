@extends('admin.layouts.master')

@section('title','Edit $page')

@section('styles')
    <link rel="stylesheet" href="/red/redactor.css" />
    <style>
        .redactor_editor { height:500px}
    </style>

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update: page", 'desc'=>'',$links = ['all pages'=> '/myadmin/pages']])


            <div class="row">

            <div class="col-md-8">
                <div class="portlet box blue ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-reorder"></i> Update page
                        </div>

                    </div>
                    <div class="portlet-body form">


                        {!! Former::vertical_open()->populate($page)->method('PATCH')->action('/myadmin/pages/'.$page->id)!!}

                        <div class="form-body">

                            {!! Former::text('title','Title') !!}

                            {!! Former::text('heading','Heading') !!}

                            {!! Former::textarea('content','Content')->style('height:300px')->id('mytext')->rows(10) !!}


                            <br> <br> <br>
                        </div>


                        @include('admin.layouts.partials.formerrors')
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="portlet box blue ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-reorder"></i> Create New page
                        </div>

                    </div>
                    <div class="portlet-body form">

                        <div class="vertical-open">
                            <div class="form-body">

                                {{--
                                    {!! Former::text('banner_image','Banner Image') !!}

                                    {!! Former::text('banner_image_alt','Banner Image Alt') !!}

                                    {!! Former::text('main_image','Main Image') !!}

                                    {!! Former::text('main_image_alt','Main Image Alt') !!}

                                    {!! Former::text('main_image_width','Main Image Width') !!}

                                    {!! Former::text('you_tube_video_id','You Tube Video Id') !!}

                                --}}
                                {!! Former::text('uri','Uri') !!}

                                {!! Former::textarea('meta_description','Meta Description')->rows(5) !!}

                                {!! Former::textarea('meta_keywords','Meta Keywords')->rows(5) !!}

                                {!! Former::text('status','Status') !!}

                                {!! Former::text('published_date','Published Date') !!}

                                <!--- Submit Field --->
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>

                                <br><br><br>
                            </div>
                            {!! Former::close()!!}
                            @include('admin.layouts.partials.formerrors')


                        </div>
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
    <script src="/jquery.js"></script>
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