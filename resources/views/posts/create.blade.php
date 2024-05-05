@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'posts.store']) !!}

        @include('posts.fields')

    {!! Form::close() !!}
</div>
@endsection
