{!! Former::text('title','Question') !!}


{!! Former::textarea('body','Answer')->style('height:300px')->id('mytext')->rows(10) !!}

{!! Former::text('published','Published') !!}


<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>