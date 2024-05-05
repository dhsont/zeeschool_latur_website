@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($resume, ['route' => ['resumes.update', $resume->id], 'method' => 'patch']) !!}

        @include('resumes.fields')

    {!! Form::close() !!}
</div>
@endsection
