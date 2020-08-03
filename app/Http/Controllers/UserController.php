<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cinema\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Session;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin', ['only' => ['create', 'edit']]);
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}

	public function find(Route $route)
	{
		$this->user = User::find($route->getParameter('usuario'));
	}

	public function index(Request $request)
	{
		$users = User::paginate(10);
		if ($request->ajax()) {
			return response()->json(view('user.users', compact('users'))->render());
		}
		return view('user.index', compact('users'));
	}

	public function create()
	{
		return view('user.create');
	}

	public function store(UserCreateRequest $request)
	{
		User::create($request->all());
		return redirect('/usuario')->with('message', 'Usuario Registrado Exitosamente.');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		return view('user.edit', ['user' => $this->user]);
	}

	public function update($id, UserUpdateRequest $request)
	{
		$this->user->fill($request->all());
		$this->user->save();

		Session::flash('message', 'Usuario Editado Exitosamente');
		return Redirect::to('/usuario');
	}

	public function destroy($id)
	{
		// User::destroy($id); // Destruye el elemento eliminando permanentemente el registro.
		$this->user->delete(); //Oculta el elemento seteando el campo deleted_at en la base de datos.
		Session::flash('message', 'Usuario Eliminado Exitosamente');
		return Redirect::to('/usuario');
	}
}
