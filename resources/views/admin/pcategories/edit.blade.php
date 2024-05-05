@extends('admin.layouts.master')

@section('title','Edit Album category')

@section('styles')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update :  Album category", 'desc'=>'',$links = ['all Album categories'=> '/myadmin/pcategories']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update : Album category
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($pcategory)->method('PATCH')->action('/myadmin/pcategories/'.$pcategory->id)!!}
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

@endsection