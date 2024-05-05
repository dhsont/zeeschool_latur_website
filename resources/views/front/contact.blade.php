@extends('front.layouts.master')
@section('title','Faq\'s')
@section('keywords', 'faq')
@section('description', 'zeeschool faq')
@section('style')
@stop



@section('content')


    <div class="col-right">
        <h3>Contact Us</h3>
        <hr class="double">
        <div class="row-fluid">
            <!--	<iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msid=217311998942217942934.00049e2f605e4c02b1993&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=21.156879,72.791977&amp;spn=0.112063,0.145912&amp;z=12&amp;output=embed"></iframe><br /><small>View <a target="_blank" href="https://maps.google.com/maps/ms?msid=217311998942217942934.00049e2f605e4c02b1993&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=21.156879,72.791977&amp;spn=0.112063,0.145912&amp;z=12&amp;source=embed" style="color:#0000FF;text-align:left">G. D. Goenka International School Surat</a> in a larger map</small> -->
            <p>Please fill up form below for more details regarding our school.</p>
            <h4>General Enquiry</h4>
            <form method="post" action="/contact-us" id="myForm">
                <div class="row-fluid">
                    <div class="span6">
                        <label>Name <span class="required">* </span></label>
                        <input type="text" value="" class="span12 validate[required]] ie7-margin" name="name" id="fname">
                    </div>
                    <div class="span6">
                        <label>Email <span class="required">* </span></label>
                        <input type="email" value="" name="email" id="email" class="validate[required,custom[email]] span12 ie7-margin">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <label>Phone No<span class="required">* </span></label>
                        <input type="text" value="" name="phone" id="phone" class="span12 validate[required]] ie7-margin">
                    </div>
                    <div class="span6">
                        <label>Mobile No<span class="required">* </span></label>
                        <input type="text" value="" name="mobile" id="mobile" class="span12 validate[required]] ie7-margin">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <label>Message <span class="required">*</span></label>
                        <textarea rows="5" value="" name="msg" id="msg" class="span12 validate[required]]"></textarea>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <input type="submit" id="submit-contact" value="Submit" class=" button_medium">
                    </div>
                </div>
                <hr>
                @if(count(Session::get('flash_notification'))>0)
                    <div class="alert alert-{{Session::get('flash_notification.level')}}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <strong>{{ucwords(Session::get('flash_notification.level'))}}!</strong> {{ Session::get('flash_notification.message') }}
                    </div>
                @endif
            </form>
        </div>

    </div><!-- end col right-->

@stop

@section('scripts')
@stop