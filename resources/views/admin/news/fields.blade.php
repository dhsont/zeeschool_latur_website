{!! Former::text('title','Title') !!}


{!! Former::textarea('body','News Content')->style('height:300px')->id('mytext')->rows(10) !!}

{!! Former::text('slug','Slug') !!}

{!! Former::text('featured','Featured') !!}

{!! Former::text('published','Published') !!}

{!! Former::text('meta_keywords','Meta Keywords') !!}

{!! Former::text('meta_description','Meta Description') !!}


<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>