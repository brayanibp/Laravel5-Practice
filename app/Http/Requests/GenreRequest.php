<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class GenreRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'genre' => 'required|min:3'
		];
	}
}
