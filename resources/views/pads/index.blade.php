@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Pads</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pads.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($pads->isEmpty())
                <div class="well text-center">No Pads found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Title</th>
			<th>Desc</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($pads as $pad)
                        <tr>
                            <td>{!! $pad->title !!}</td>
					<td>{!! $pad->desc !!}</td>
                            <td>
                                <a href="{!! route('pads.edit', [$pad->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('pads.delete', [$pad->id]) !!}" onclick="return confirm('Are you sure wants to delete this Pad?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection