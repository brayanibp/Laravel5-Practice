<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class MailController extends Controller
{

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		Mail::send('emails.contact', $request->all(), function ($msg) {
			$msg->to('manolo27093430@gmail.com', 'Brayan Bernal');
			$msg->subject('Correo de Contacto');
		});
		$request->session()->flash('message', 'Correo Enviado Correctamente');
		return redirect('/contacto');
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
