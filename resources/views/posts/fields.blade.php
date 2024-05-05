<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Age Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::text('age', null, ['class' => 'form-control']) !!}
</div>

<!--- Body Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<!--- Keywords Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
</div>

<!--- Description Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
