@extends('admin.layouts.master')

@section('title','Create  Album category')

@section('styles')

@stop


@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Create', 'desc'=>'Create Album category',$links = ['All Album categories '=> '/myadmin/pcategories']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Create New Album  category
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::horrizontal_open()->method('Post')->action('myadmin/pcategories')!!}
                            <div class="form-body">

                                @include('admin.pcategories.fields')
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

@stop