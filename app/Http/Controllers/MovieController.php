<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MovieController extends Controller
{

	public function index()
	{
		return "Esto es index";
	}

	public function create()
	{
		return "Formulario de creación";
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
