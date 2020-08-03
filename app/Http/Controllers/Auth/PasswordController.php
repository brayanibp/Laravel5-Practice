<?php

namespace Cinema\Http\Controllers\Auth;

use Cinema\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

	protected $auth;

	protected $passwords;

	public function getEmail()
	{
		return view('auth.password');
	}

	public function postEmail(Request $request)
	{
		$this->validate($request, ['email' => 'required|email']);

		$response = $this->passwords->sendResetLink($request->only('email'), function ($m) {
			$m->subject($this->getEmailSubject());
		});

		switch ($response) {
			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));

			case PasswordBroker::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}
	}

	protected function getEmailSubject()
	{
		return isset($this->subject) ? $this->subject : 'Your Password Reset Link';
	}

	public function getReset($token = null)
	{
		if (is_null($token)) {
			throw new NotFoundHttpException;
		}

		return view('auth.reset')->with('token', $token);
	}

	public function postReset(Request $request)
	{
		$this->validate($request, [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

		$credentials = $request->only(
			'email',
			'password',
			'password_confirmation',
			'token'
		);

		$response = $this->passwords->reset($credentials, function ($user, $password) {
			$user->password = $password; //I' ve removed bcrypt() function to let the \Hash function on User class do the encryption.

			$user->save();

			$this->auth->login($user);
		});

		switch ($response) {
			case PasswordBroker::PASSWORD_RESET:
				return redirect($this->redirectPath());

			default:
				return redirect()->back()
					->withInput($request->only('email'))
					->withErrors(['email' => trans($response)]);
		}
	}

	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath')) {
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
	}

	//use ResetsPasswords; //Stored in vendor/Illuminate/Foundation/Auth/ResetsPasswords;

	protected $redirectTo = '/admin';
	protected function resetPassword($user, $password)
	{
		$user->password = $password;
		$user->save();
		Auth::login($user);
	}

	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
}
