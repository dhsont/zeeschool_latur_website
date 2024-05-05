@extends('admin.layouts.master')

@section('title','Edit Resume')

@section('styles')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update: Resume", 'desc'=>'',$links = ['all resumes'=> '/myadmin/resumes']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update :Resume
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($resume)->method('PATCH')->action('/myadmin/resumes/'.$resume->id)!!}
                            <div class="form-body">

                                {!! Former::text('name') !!}
                                {!! Former::text('photo') !!}
                                {!! Former::text('post') !!}
                                {!! Former::text('qualification') !!}
                                {!! Former::text('country') !!}
                                {!! Former::text('pincode') !!}
                                {!! Former::text('mobile') !!}
                                {!! Former::text('address') !!}
                                {!! Former::text('email') !!}
                                {!! Former::text('experience') !!}
                                {!! Former::text('resume') !!}

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

@endsection