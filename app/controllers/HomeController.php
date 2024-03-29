<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function showLogin()
	{
		return View::make('pages.login');
	}
	public function doLogin()
	{
		$rules = array(
			//'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			$f = filter_var(Input::get('username'), FILTER_VALIDATE_EMAIL) ? 'user_email' : 'username';

			// create our user data for the authentication
			$userdata = array(
				$f => Input::get('username'),
				'password' => Input::get('password')
			);


			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				echo"sucess";
				$user = Auth::user();
				if ($user->hasRole('Administrator'))
    			{
        			return Redirect::to('profile');
    			}
 
    			
				return Redirect::to('/hello');
				// for now we'll just echo success (even though echoing in a controller is bad)

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('/login');

			}

		}
	}
	public function doLogout()
	{

		 if(Auth::check())
		 {
		 	Auth::logout();
		 return Redirect::to('login');
		 	}
		 	return Redirect::to('reg');
		 }
}
