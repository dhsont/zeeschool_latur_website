@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'resumes.store']) !!}

        @include('resumes.fields')

    {!! Form::close() !!}
</div>
@endsection
