@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Bottles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('bottles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($bottles->isEmpty())
                <div class="well text-center">No Bottles found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Desc</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($bottles as $bottle)
                        <tr>
                            <td>{!! $bottle->name !!}</td>
					<td>{!! $bottle->desc !!}</td>
                            <td>
                                <a href="{!! route('bottles.edit', [$bottle->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('bottles.delete', [$bottle->id]) !!}" onclick="return confirm('Are you sure wants to delete this Bottle?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection