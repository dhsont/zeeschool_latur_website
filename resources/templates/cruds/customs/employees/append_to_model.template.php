<?php
	// tiene varios familiares
	public function families()
	{
		return $this->hasMany('App\cruds\Family');
	}

    public function getFullNameAttribute()
    {
    	return $this->first_name . ' ' . $this->last_name;
    }	