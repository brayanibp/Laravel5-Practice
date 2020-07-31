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

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(10);
		return view('user.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
		User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => $request['password'],
		]);
		return redirect('/usuario')->with('message', 'Usuario Registrado Exitosamente.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return view('user.edit', ['user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserUpdateRequest $request)
	{
		$user = User::find($id);
		$user->fill($request->all());
		$user->save();

		Session::flash('message', 'Usuario Editado Exitosamente');
		return Redirect::to('/usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		Session::flash('message', 'Usuario Eliminado Exitosamente');
		return Redirect::to('/usuario');
	}
}
