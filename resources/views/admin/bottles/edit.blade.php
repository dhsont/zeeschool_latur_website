@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($bottle, ['route' => ['bottles.update', $bottle->id], 'method' => 'patch']) !!}

        @include('bottles.fields')

    {!! Form::close() !!}
</div>
@endsection
