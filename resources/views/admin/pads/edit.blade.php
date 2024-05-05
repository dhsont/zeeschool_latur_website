@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($pad, ['route' => ['pads.update', $pad->id], 'method' => 'patch']) !!}

        @include('pads.fields')

    {!! Form::close() !!}
</div>
@endsection
