@extends('front.layouts.master')
@section('title', '')
@section('keywords', '')
@section('description', '')
@section('style')
@stop

<?php $nolsidebar =1?>
<?php $norsidebar =1?>


@section('content')

<div class="container">

    <div class="row">
        <!-- =========================Start Col right section ============================= -->
        <section class="span12">
            <div class="col-right">
                <h1 class="pagetitle">Video Gallery</h1>
                <hr class="double">
                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs bold">

                        @foreach($data as $category)

                            <?PHP
                            $loop->index;       // int, zero based
                            $loop->index1;      // int, starts at 1
                            $loop->revindex;    // int
                            $loop->revindex1;   // int
                            $loop->first;       // bool
                            ?>

                            @if($loop->first)
                                        <li class="active"><a data-toggle="tab" href="#1" data-slider="myCarousel"> {!! $category->name !!}</a></li>

                            @else
                                <li class=""><a data-toggle="tab" href="#{!! $loop->index1 !!}" data-slider="myCarousel"> {!! $category->name !!}</a></li>

                            @endif
                        @endforeach



                    </ul>
                    <div class="tab-content">

                        @foreach($data as $category)




                                @if($loop->first)
                            <div id="1" class="tab-pane active">
                                <ul class="thumbnails">

                                    @foreach($category->valbums as $album )
                                    <li class="span3">
                                        {!! $album->link !!}
                                        <br>
                                        <strong> {!! $album->title !!}</strong>
                                    </li>
                                        @endforeach

                                </ul>
                            </div>

                            @else


                                    jj
                                    <div id="{!! $loop->index1 !!}" class="tab-pane">
                                        <ul class="thumbnails">

                                            @foreach($category->valbums as $album )
                                                <li class="span3">
                                                    {!! $album->link !!}
                                                    <br>
                                                    <strong> {!! $album->title !!} tyrty</strong>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>

                            @endif


                        @endforeach

                    </div>

                </div>



            </div><!-- end col right-->
        </section>
    </div><!-- end row-->
</div> <!-- end container-->

@stop

