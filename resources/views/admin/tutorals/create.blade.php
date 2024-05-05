@extends('admin.layouts.master')

@section('title','Create  $tutoral')

@section('styles')

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Create tutorals', 'desc'=>'Create $tutoral',$links = ['all $tutorals'=> '/myadmin/resumes']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Create New $tutoral
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::horrizontal_open()->method('Post')->action('myadmin/resumes')!!}
                            <div class="form-body">

                                @include('admin.tutorals.fieldswadas')

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
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