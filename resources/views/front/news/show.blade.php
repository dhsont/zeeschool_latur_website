@extends('front.layouts.master')
@section('title', $news->title)
@section('keywords', $news->meta_keywords)
@section('description', $news->meta_description)
@section('style')
@stop


@section('content')

    <div class="col-right">
        <!--Start body of page-->

        <h1 style="text-align:center; color:rgb(0, 148, 221); font-weight:bold;" class="pagetitle">
            {!! $news->title !!}
        </h1>

        {!! $news->body !!}

        <!-- EOF page content-->
    </div>
@stop

@section('scripts')
@stop