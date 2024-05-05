@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'pads.store']) !!}

        @include('pads.fields')

    {!! Form::close() !!}
</div>
@endsection
