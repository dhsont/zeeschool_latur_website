@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($bomb, ['route' => ['bombs.update', $bomb->id], 'method' => 'patch']) !!}

        @include('bombs.fields')

    {!! Form::close() !!}
</div>
@endsection
