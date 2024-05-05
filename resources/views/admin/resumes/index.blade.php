@extends('admin.layouts.master')

@section('title','Resumes')
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

            @include('admin.layouts.partials.pageheader',['title'=>'Resumes', 'desc'=>'Resumes',$links = ['Create Resume'=> '/myadmin/resumes/create']])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @if ($resumes->count())
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Resumes
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a class="btn default" href="#" data-toggle="dropdown">
                                            Columns <i class="fa fa-angle-down"></i>
                                        </a>

                                        <div id="sample_2_column_toggler"
                                             class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                            <label><input type="checkbox" checked data-column="0">Name</label>
                                            <label><input type="checkbox" checked data-column="0">Photo</label>
                                            <label><input type="checkbox" checked data-column="0">Post</label>
                                            <label><input type="checkbox" checked data-column="0">Qualification</label>
                                            <label><input type="checkbox" checked data-column="0">Country</label>
                                            <label><input type="checkbox" checked data-column="0">Pincode</label>
                                            <label><input type="checkbox" checked data-column="0">Mobile</label>
                                            <label><input type="checkbox" checked data-column="0">Address</label>
                                            <label><input type="checkbox" checked data-column="0">Email</label>
                                            <label><input type="checkbox" checked data-column="0">Experience</label>
                                            <label><input type="checkbox" checked data-column="0">Resume</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-full-width"
                                       id="sample_2">
                                    <thead>
                                    <tr>
                                        <th> Name</th>

                                        <th>Post</th>
                                        <th>Qualification</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($resumes as $resume)
                                        <tr>
                                            <td><a href="/myadmin/resumes/{{ $resume->id }}">{{{ $resume->name }}}</a>
                                            </td>

                                            <td>{{{ $resume->post }}}</td>
                                            <td>{{{ $resume->qualification }}}</td>
                                            <td>{{{ $resume->mobile }}}</td>
                                            <td>{{{ $resume->email }}}</td>
                                            <td>{{  Carbon::parse($resume->created_at)->toFormattedDateString() }}</td>
                                            <td>
                                                <div class="btn-group btn-group-solid">

                                                    <a class='btn btn-info fa fa-edit'
                                                       href="/myadmin/resumes/{{$resume->id}}/edit">EDIT </a>

                                                    <a href="{!! route('resumes.delete', [$resume->id]) !!}"
                                                       onclick="return confirm('Are you sure wants to delete this resume?')"><i
                                                                class="glyphicon glyphicon-remove"></i></a>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        There are no Resumes
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