	// pertenece a un empleado
	public function employee()
	{
		return $this->belogsTo('App\cruds\Employee');
	}