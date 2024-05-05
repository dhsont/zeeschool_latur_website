@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($ppp, ['route' => ['ppps.update', $ppp->id], 'method' => 'patch']) !!}

        @include('ppps.fields')

    {!! Form::close() !!}
</div>
@endsection
