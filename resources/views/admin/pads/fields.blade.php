<!--- Title Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!--- Desc Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('desc', 'Desc:') !!}
    {!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
