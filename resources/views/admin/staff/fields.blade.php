{!! Former::text('name','Name') !!}

{!! Former::text('designation','Designation') !!}

{!! Former::text('qualification','Qualification') !!}

{!! Former::text('experience','Experience') !!}


{!! Former::textarea('description','Description')->style('height:300px')->id('mytext')->rows(5) !!}

{!! Former::text('category','Category') !!}
{!! Former::file('avatar','Photo') !!}

{!! Former::text('category_id','Category Id') !!}

{!! Former::text('likes','Likes') !!}


<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>