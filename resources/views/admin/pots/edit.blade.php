@extends('admin.layouts.master')

@section('title','Edit Pot')

@section('styles')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update: Pot", 'desc'=>'',$links = ['all pots'=> '/myadmin/pots']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update :Pot
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($pot)->method('PATCH')->action('/myadmin/pots/'.$pot->id)!!}
                            <div class="form-body">

                              @include('admin.pots.fields')

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