{!! Former::text('title','Title:') !!}


{!! Former::select('vcategory_id', 'Category')->fromQuery(App\Models\Vcategory::all(), 'name', 'id') !!}

{!! Former::text('desc','Desc:') !!}

{!! Former::text('link','Link:') !!}

{!! Former::text('width','Width:') !!}

{!! Former::text('height','Height:') !!}


<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>