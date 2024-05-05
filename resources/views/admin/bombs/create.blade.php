@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'bombs.store']) !!}

        @include('bombs.fields')

    {!! Form::close() !!}
</div>
@endsection
