@extends('admin.layouts.master')

@section('title','contacts')
@stop

@section('styles')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/select2/select2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/admin/plugins/select2/select2-metronic.css"/>
    <link rel="stylesheet" href="/assets/admin/plugins/data-tables/DT_bootstrap.css"/>
    <!-- END PAGE LEVEL STYLES -->

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'contacts', 'desc'=>'contacts',$links = ['Create contact'=> '/myadmin/contacts/create']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @if ($contacts->count())
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>contacts
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn default" href="#" data-toggle="dropdown">
                                            Columns <i class="fa fa-angle-down"></i>
                                        </a>

                                        <div id="sample_2_column_toggler"
                                             class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                            <label><input type="checkbox" checked data-column="0">contact</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="sample_2">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Mobile</th>
			<th>Message</th>
			<th>Spam</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>{!! $contact->name !!}</td>
					<td>{!! $contact->email !!}</td>
					<td>{!! $contact->phone !!}</td>
					<td>{!! $contact->mobile !!}</td>
					<td>{!! $contact->message !!}</td>
					<td>{!! $contact->spam !!}</td>
                                            <td>
                                                <a class='btn btn-info fa fa-eye'
                                                href="/myadmin/contacts/{!!$contact->id!!}"></a>
                                                <a class='btn btn-info fa fa-edit'
                                                       href="/myadmin/contacts/{!!$contact->id!!}/edit"> </a>

                                                    <a href="{!! route('contacts.delete', [$contact->id]) !!}"
                                                       onclick="return confirm('Are you sure wants to delete this contact?')"><i
                                                               class="btn btn-info fa fa-times "></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        There are no contacts
                    @endif
                </div>
                <!-- End table -->
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- BEGIN CONTENT -->
    </div>

@stop

@section('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="/assets/admin/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="/assets/admin/plugins/data-tables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/admin/plugins/data-tables/DT_bootstrap.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <script src="/assets/admin/scripts/custom/table-advanced.js"></script>

    <?php
    // initialize page script or not
    $initilize = TRUE;
    ?>
    <script>
        jQuery(document).ready(function () {
            App.init();
            TableAdvanced.init();
        });
    </script>

@stop