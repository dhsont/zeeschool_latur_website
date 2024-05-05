@extends('front.layouts.master')
@section('title', $page->title)
@section('keywords', $page->meta_keywords)
@section('description', $page->meta_description)
@section('style')
@stop


@section('content')



    <style>
        table { border:  1px solid black}
        td { border:  1px solid black}
        th { border:  1px solid black}


    </style>
    <div class="col-right">
        <!--Start body of page-->

        <h1 style="text-align:center; color:rgb(0, 148, 221); font-weight:bold;" class="pagetitle">
            {!! $page->heading !!}
        </h1>

        {!! $page->content !!}

        <!-- EOF page content-->
    </div>
@stop

@section('scripts')
@stop