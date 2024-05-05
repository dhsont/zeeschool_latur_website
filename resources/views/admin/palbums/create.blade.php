@extends('admin.layouts.master')

@section('title','Add  Photo Album')

@section('styles')

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Add Album', 'desc'=>'Add Photo Album',$links = ['All Photo Albums '=> '/myadmin/palbums']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">

                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i> Add New Photo Album
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!! Former::open_for_files()->method('Post')->action('myadmin/palbums')!!}
                            <div class="form-body">

                                @include('admin.palbums.fields')


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