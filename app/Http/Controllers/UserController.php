<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
* 
*/
class UserController extends Controller
{
	public function getDashboard()
	{
		return view('dashboard');
	}

	public function postSignUp(Request $request)
	{
		$this->validate($request, [
				'email' => 'required|email|unique:users',
				'first_name' => 'required|max:120',
				'password'   => 'required|min:4'
			]);
		$first_name = $request['first_name'];
		$email = $request['email'];
		$password = bcrypt($request['password']);

		$user = new User();
		$user->first_name = $first_name;
		$user->email = $email;
		$user->password = $password;

		$user->save();  //saves the above to the database

		Auth::login($user);

		//return redirect()->back(); // after sign redirect user to the previous page

		return redirect()->route('dashboard');

	}

	public function postSignIn(Request $request)
	{
		$this->validate($request, [
				'email' => 'required',
				'password'   => 'required'
			]);

			if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
				return redirect()->route('dashboard');  //auth attemp is successful
			}
			return redirect()->back();                  //if auth failed return to login screen 
	}
}