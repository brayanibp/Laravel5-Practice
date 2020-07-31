<?php

namespace Cinema\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cinema\Http\Requests;
use Cinema\Http\Requests\LoginRequest;
use Cinema\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LogController extends Controller
{

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(LoginRequest $request)
	{
		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
			return Redirect::to('/admin');
		} else {
			Session::flash('message-error', 'Datos Incorrectos');
			return Redirect::to('/');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
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
