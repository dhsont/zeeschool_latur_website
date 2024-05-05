@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ppps</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('ppps.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($ppps->isEmpty())
                <div class="well text-center">No ppps found.</div>
            @else
                <table class="table">
                    <thead>
                    
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($ppps as $ppp)
                        <tr>
                            
                            <td>
                                <a href="{!! route('ppps.edit', [$ppp->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('ppps.delete', [$ppp->id]) !!}" onclick="return confirm('Are you sure wants to delete this ppp?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection