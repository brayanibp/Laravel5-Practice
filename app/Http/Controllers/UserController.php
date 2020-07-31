<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cinema\User;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Session;

class UserController extends Controller
{

	public function index()
	{
		$users = User::paginate(10);
		return view('user.index', compact('users'));
	}

	public function create()
	{
		return view('user.create');
	}

	public function store(UserCreateRequest $request)
	{
		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => $request['password'],
		]);
		return redirect('/usuario')->with('message', 'Usuario Registrado Exitosamente.');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$user = User::find($id);
		return view('user.edit', ['user' => $user]);
	}

	public function update($id, UserUpdateRequest $request)
	{
		$user = User::find($id);
		$user->fill($request->all());
		$user->save();

		Session::flash('message', 'Usuario Editado Exitosamente');
		return Redirect::to('/usuario');
	}

	public function destroy($id)
	{
		// User::destroy($id); // Destruye el elemento eliminando permanentemente el registro.
		$user = User::find($id);
		$user->delete(); //Oculta el elemento seteando el campo deleted_at en la base de datos.
		Session::flash('message', 'Usuario Eliminado Exitosamente');
		return Redirect::to('/usuario');
	}
}
