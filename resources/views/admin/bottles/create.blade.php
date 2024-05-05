@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'bottles.store']) !!}

        @include('bottles.fields')

    {!! Form::close() !!}
</div>
@endsection
