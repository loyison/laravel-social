<?php


namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
/**
* 
*/
class UserController extends Controller
{
	public function postSignUp(Request $request)
	{
		$first_name = $request['first_name'];
		$email = $request['email'];
		$password = bcrypt($request['password']);

		$user = new User();
		$user->first_name = $first_name;
		$user->email = $email;
		$user->password = $password;

		$user->save();  //saves the above to the database

		return redirect()->back(); // after sign redirect user to the previous page

	}

	public function postSignIn(Request $request)
	{

	}
}