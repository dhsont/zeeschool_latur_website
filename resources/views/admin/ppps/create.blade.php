@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'ppps.store']) !!}

        @include('ppps.fields')

    {!! Form::close() !!}
</div>
@endsection
