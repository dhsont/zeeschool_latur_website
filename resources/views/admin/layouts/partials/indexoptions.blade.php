
{{ Form::open(array('method' => 'DELETE', 'route' => array($route, $id))) }}
{{ Form::submit('Delete', array('class' => 'btn btn-danger fa fa-times')) }}
{{ Form::close() }}