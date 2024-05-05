@extends('front.layouts.master')
@section('title','Faq\'s')
@section('keywords', 'faq')
@section('description', 'zeeschool faq')
@section('style')
@stop


@section('content')

    <div class="col-right">
        <!--Start body of page-->

        <h1 style="text-align:center; color:rgb(0, 148, 221); font-weight:bold;" class="pagetitle"> FAQ's</h1>
        <hr class="double">




        @foreach($faqs as $faq)


            <a class="accrodian-trigger" href="#"><strong>{!! $loop->index1 !!} &nbsp;&nbsp;</strong> {!! $faq->title !!}</a>
            <div class="accrodian-data">
                <p>{!! $faq->body !!}</p>
            </div>

        @endforeach

        <!-- EOF page content-->
    </div>
@stop

@section('scripts')
@stop