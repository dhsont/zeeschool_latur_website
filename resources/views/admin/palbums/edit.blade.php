@extends('admin.layouts.master')

@section('title','Edit Photo Album')

@section('styles')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update :  Photo Album", 'desc'=>'',$links = ['all palbums'=> '/myadmin/palbums']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update :Photo Album
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($palbum)->method('PATCH')->action('/myadmin/palbums/'.$palbum->id)!!}
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

@endsection