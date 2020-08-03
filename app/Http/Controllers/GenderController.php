<?php

namespace Cinema\Http\Controllers;

use Cinema\Genre;
use Cinema\Http\Requests;
use Cinema\Http\Requests\GenreRequest;
use Cinema\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class GenderController extends Controller
{

	public function __construct()
	{
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function find(Route $route)
	{
		$this->genre = Genre::find($route->getParameter('genero'));
		$this->NotFound($this->genre);
	}

	public function listing()
	{
		$genres = Genre::all();
		return response()->json($genres);
	}

	public function index()
	{
		return view('gender.index');
	}

	public function create()
	{
		return view('gender.create');
	}

	public function store(GenreRequest $request)
	{
		Genre::create($request->all());
		if ($request->ajax()) {
			return response()->json([
				"message" => "Created"
			]);
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		return response()->json($this->genre);
	}

	public function update(Request $request, $id)
	{
		$this->genre->fill($request->all());
		$this->genre->save();
		return response()->json(['message' => 'updated']);
	}

	public function destroy($id)
	{
		$this->genre->delete();
		return response()->json(['message' => 'deleted']);
	}
}
