<?php

class AuthController extends BaseController {

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
	public function getLogin()
	{
		return View::make('login');
	}


	public function getLogout()
	{
		Sentry::logout();
		return Redirect::to('auth/login');
	}

	public function postLogin()
	{
		try
		{
		    // Login credentials
		    $credentials = array(
		        'email'    => Input::get('username'),
		        'password' => Input::get('password'),
		    );

		    // Authenticate the user
		    $user = Sentry::authenticate($credentials, false);

		    return Redirect::intended('/');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    $msg = 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $msg = 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    $msg = 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $msg = 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $msg = 'User is not activated.';
		}

		// The following is only required if the throttling is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    $msg = 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    $msg = 'User is banned.';
		}
		return Redirect::to('auth/login')
					->withInput()
                    ->with('exception', $msg);
	}

}