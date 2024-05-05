@extends('admin.layouts.master')

@section('title','Resumes')
@section('styles')

@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">

            @include('admin.layouts.partials.pageheader',['title'=>'Resumes', 'desc'=>'',$links = ['Edit'=> "/myadmin/resumes/$resume->id/edit"]])

            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tbody>

                        <tr>
                            <td>Name</td>
                            <td>{{{ $resume->name }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Post</td>
                            <td>{{{ $resume->post }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Qualification</td>
                            <td>{{{ $resume->qualification }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Country</td>
                            <td>{{{ $resume->country }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Pincode</td>
                            <td>{{{ $resume->pincode }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{{ $resume->mobile }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Address</td>
                            <td>{{{ $resume->address }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Email</td>
                            <td>{{{ $resume->email }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Experience</td>
                            <td>{{{ $resume->experience }}}</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Resume</td>
                            <td><a href="{{ $resume->resume }}">Download</a></td>
                        </tr>
                        <tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">

                    <img src="{{$resume->avatar->url('medium')}}" alt="profile photo"/>


                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- BEGIN CONTENT -->
    </div>
@stop

@section('scripts')

@stop