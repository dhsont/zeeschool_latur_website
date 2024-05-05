@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">resumes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('resumes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($resumes->isEmpty())
                <div class="well text-center">No resumes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Feedback</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($resumes as $resume)
                        <tr>
                            <td>{!! $resume->name !!}</td>
					<td>{!! $resume->mobile !!}</td>
					<td>{!! $resume->email !!}</td>
					<td>{!! $resume->feedback !!}</td>
                            <td>
                                <a href="{!! route('resumes.edit', [$resume->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('resumes.delete', [$resume->id]) !!}" onclick="return confirm('Are you sure wants to delete this resume?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection