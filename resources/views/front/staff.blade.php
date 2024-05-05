@extends('front.layouts.master')
@section('content')

    <div class="col-right">
        <h1 class="pagetitle">{!!  Request::segment(2) !!}</h1> <!-- TODO:: Make it working change it as needed -->
        <hr class="double">

        @foreach($staffs as $staff)
            <div class="row-fluid">
                <div class="span3">
                    <div class="img-polaroid"><img src="{!!$staff->avatar->url('medium')!!}" alt=""></div>
                </div>
                <div class="span9">
                    <h4>{!! ucwords($staff->name) !!}</h4>
                    <p><b>Designation : </b>{!! ucwords($staff->designation) !!}</p>



                    {{--   <p><b>Qualification : </b>{!! ucwords($staff->qualification) !!}</p> --}}

                    @if($staff->experience != '')

                        <p><b>Experience : </b>{!! ucwords($staff->experience) !!}</p>

                    @endif
                </div>
            </div>
            <div class="row-fluid">
                <p style="margin-top:8px;"> {!! $staff->description !!} </p>
            </div>
            <hr>
        @endforeach
    </div><!-- end col right-->
@stop

@section('scripts')
@stop