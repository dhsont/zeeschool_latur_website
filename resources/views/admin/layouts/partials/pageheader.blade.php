<!-- BEGIN PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <h3 class="page-title">
            {{ ucwords($title) }} <small>{{ $desc }}</small>
        </h3>
        <ul class="page-breadcrumb breadcrumb">
            <li class="btn-group">
             @if(isset($links))

                @if(count($links)>1)
                    <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        <span>Actions</span>
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        @foreach($links as $title=>$link )
                        <li><a href="{{$link}}">{{ ucwords($title) }}</a></li>
                        @endforeach
                    </ul>
                @else
                       @foreach($links as $title=>$link )
                          <a class="btn blue" href="{{$link}}">{{ ucwords($title) }}</a>
                       @endforeach
                @endif
             @endif
            </li>
            <li>
                <i class="fa fa-home"></i>
                <a href="/myadmin"> Logged In</a>
                <i class="fa fa-angle-right"></i>
            </li>

        </ul>
<!-- END PAGE TITLE & BREADCRUMB-->



        @include('admin.layouts.partials.flashmessages')

    </div>
</div>
<!-- END PAGE HEADER-->