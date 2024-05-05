@extends('admin.layouts.master')

@section('title','Edit $contact')

@section('styles')

@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>"Update: contact", 'desc'=>'',$links = ['all contacts'=> '/myadmin/contacts']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder fa-pencil-square-o "></i> Update :contact
                            </div>

                        </div>
                        <div class="portlet-body form">

                            {!!
                            Former::horrizontal_open()->populate($contact)->method('PATCH')->action('/myadmin/contacts/'.$contact->id)!!}
                            <div class="form-body">

                              @include('admin.contacts.fields')

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