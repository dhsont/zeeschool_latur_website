<li class=" @if(Request::segment(2)==$segment) active  @endif ">
    <a href="javascript:;">
        <i class="fa fa-folder"></i>
        <span class="title">{!! $title !!}</span>
        <span class="selected"></span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        @foreach($links as $ltitle => $link)
        <li> <a href="{!! $link !!}">{!! $ltitle !!}</a></li>

        @endforeach

    </ul>
</li>