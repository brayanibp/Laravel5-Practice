<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;

use Illuminate\Http\Request;

class MovieController extends Controller
{

	public function index()
	{
		//return "Esto es index";
	}

	public function create()
	{
		$genres = Genre::lists('genre', 'id');
		return view('movie.create', compact('genres'));
	}

	public function store(Request $request)
	{
		Movie::create($request->all());
		return "Listo";
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
