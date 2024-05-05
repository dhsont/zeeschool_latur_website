@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Posts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('posts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($posts->isEmpty())
                <div class="well text-center">No Posts found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Name</th>
			<th>Age</th>
			<th>Body</th>
			<th>Keywords</th>
			<th>Description</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{!! $post->name !!}</td>
					<td>{!! $post->age !!}</td>
					<td>{!! $post->body !!}</td>
					<td>{!! $post->keywords !!}</td>
					<td>{!! $post->description !!}</td>
                            <td>
                                <a href="{!! route('posts.edit', [$post->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('posts.delete', [$post->id]) !!}" onclick="return confirm('Are you sure wants to delete this Post?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection