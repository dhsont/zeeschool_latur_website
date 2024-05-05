  @if(count(Session::get('flash_notification'))>0)
        <div class="alert alert-{{Session::get('flash_notification.level')}}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <strong>{{ucwords(Session::get('flash_notification.level'))}}!</strong> {{ Session::get('flash_notification.message') }}
        </div>
@endif