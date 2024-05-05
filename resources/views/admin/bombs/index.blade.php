@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Bombs</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('bombs.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($bombs->isEmpty())
                <div class="well text-center">No Bombs found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Desc</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     <tr>
    {!! Form::open(['route' => 'bombs.index', 'method' => 'get', class="form-inline", id="search_form"]) !!}

        

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>



<!--- Desc Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('desc', 'Desc:') !!}
    {!! Form::text('desc', null, ['class' => 'form-control']) !!}
</div>



        <td>
            <span onclick="return $('#search_form').submit()" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-search"></i>
            </span>
        </td>

    {!! Form::close() !!}
</tr>
                    @foreach($bombs as $bomb)
                        <tr>
                            <td>{!! $bomb->name !!}</td>
					<td>{!! $bomb->desc !!}</td>
                            <td>
                                <a href="{!! route('bombs.edit', [$bomb->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('bombs.delete', [$bomb->id]) !!}" onclick="return confirm('Are you sure wants to delete this Bomb?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection