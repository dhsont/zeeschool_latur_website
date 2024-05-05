{!! Former::text('Title','Title:') !!}

{{--
{!! Former::text('pcategory_id', 'Category')->useDatalist(App\Models\Pcategory::all(), 'id') !!}

{!! Former::text('pcategory_id', 'Category')->useDatalist(App\Models\Pcategory::all(), 'id') !!}

--}}
{!! Former::select('pcategory_id', 'Category')->fromQuery(App\Models\Pcategory::all(), 'name', 'id') !!}
{!! Former::text('desc','Desc:') !!}

{!! Former::textarea('link','Link:')->colls(10)->rows(20) !!}

{!! Former::file('photo','Photo:')->colls(10)->rows(20) !!}

<!--- Submit Field --->
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-danger">Submit</button>
    </div>
</div>