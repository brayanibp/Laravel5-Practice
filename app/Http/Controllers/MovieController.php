<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Genre;
use Cinema\Movie;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

	public function __construct()
	{
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function find(Route $route)
	{
		$this->movie = Movie::find($route->parameter('pelicula'));
		$this->NotFound($this->movie);
	}

	public function index()
	{
		$movies = Movie::Movies();
		return view('movie.index', compact('movies'));
	}

	public function create()
	{
		$genres = Genre::lists('genre', 'id');
		return view('movie.create', compact('genres'));
	}

	public function store(Request $request)
	{
		Movie::create($request->all());
		Session::flash('message', 'Película Creada Correctamente');
		return redirect('/pelicula');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$genres = Genre::lists('genre', 'id');
		return view('movie.edit', ['movie' => $this->movie, 'genres' => $genres]);
	}

	public function update(Request $request)
	{
		Storage::delete($this->movie->path);
		$this->movie->fill($request->all());
		$this->movie->save();
		Session::flash('message', 'Película Actualizada Correctamente');
		return redirect('/pelicula');
	}

	public function destroy($id)
	{
		Storage::delete($this->movie->path);
		$this->movie->delete();
		Session::flash('message', 'Película Eliminada Correctamente');
		return redirect('/pelicula');
	}
}
