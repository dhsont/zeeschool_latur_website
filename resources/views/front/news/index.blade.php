@extends('front.layouts.master')
@section('title', 'News of Zeeschool Latur')
<!--TODO: Add keywords & descriptions-->
@section('keywords', 'keywords')
@section('description', 'description')
@section('style')

   .pagination ul
    {
    margin: 0;
    padding: 0;
    list-style-type: none;
    }

   .pagination ul li { display: inline; }
@stop


@section('content')


    <div class="col-right" style="padding-bottom: 1px;">
        <h1 style="color: #522985; text-align: center; font-weight:bold; " class="">
            Zeeschool News
        </h1>
    </div>

    @forelse($allnews as $news)
        <div class="col-right">
            <!--Start body of page-->

            <h1 style="color: #522985; font-weight:bold; border-bottom:1px dotted red; padding: 20px 10px;" class="pagetitle">
                <a href="/news/{!! $news->slug !!}">{!! ucwords($news->title) !!}</a>
            </h1>
            <!-- TODO: limit content size 200 chractors  -->
            {!! $news->body !!}

            <a href="/news/{!! $news->slug !!}" class="btn btn-success pull-right">Read More </a>

           &nbsp;&nbsp;&nbsp;&nbsp;
            <!-- EOF page content-->
        </div>


    @empty
        no news found
    @endforelse

    <?php echo $allnews->render(); ?>
@stop

@section('scripts')
@stop