{!! Former::text('name','Name')->required() !!}

{!! Former::text('email','Email')->email() !!}

{!! Former::text('phone','Phone') !!}

{!! Former::text('mobile','Mobile') !!}

{!! Former::textarea('message','Message') !!}

{!! Former::text('spam','Spam') !!}


<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>