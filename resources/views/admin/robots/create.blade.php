@extends('admin.layouts.master')

@section('title','Create  robot')

@section('styles')

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Create robots', 'desc'=>'Create robot',$links = ['all robots'=> '/myadmin/robots']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Create New robot
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::horrizontal_open()->method('Post')->action('myadmin/robots')!!}
                            <div class="form-body">

                                @include('admin.robots.fields')
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