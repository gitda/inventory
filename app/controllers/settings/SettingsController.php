<?php

namespace settings;

use Hash;
use Input;
use Redirect;
use Sentry;
use User;
use Validator;
use View;

class SettingsController extends \BaseController {

	

	public function getAccount()
	{
		return View::make('settings.password');
	}

	public function postAccount()
	{
		$input = Input::all();

		$user = Sentry::findUserById(Sentry::getUser()->id);

    	if (!Hash::check($input['old_password'], $user->password))
		{
		    return View::make('settings.password')
		    			->withErrors(array('old_password'=>'old password not match'));
		}

		$rules = array(
	        'old_password' 			=> 'required',
	        'password' 				=> 'required|confirmed|min:4',
	        'password_confirmation' => 'required|min:4'
	    );

		$validator = Validator::make($input, $rules);

	    if ($validator->failed()) {
	    	return View::make('settings.password')
					->withErrors($validator);
        }


        $resetCode = $user->getResetPasswordCode();
        if ($user->attemptResetPassword($resetCode, $input['password']))
        {
            return Redirect::to('auth/logout');
        }

        return View::make('settings.password')
					->with('msg', 'Update Failed');
		
	}


}