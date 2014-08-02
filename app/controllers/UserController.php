<?php

class UserController extends BaseController {


	public function __construct() {

		parent::__construct();		

        	$this->beforeFilter('guest', array('only' => array('getLogin','getSignup')));	
    }



	public function getSignup() {

		return View::make('signup');

	}

	
	public function postSignup() {

		// Rules
			
		$rules = array(
			'login' => 'required|unique:users,login',
			'password' => 'required|min:6',
			'firstname' => 'required|alpha',
			'lastname' => 'required|alpha'
		);			

		// Validation
 		
		$validator = Validator::make(Input::all(), $rules);

		
		if($validator->fails()) {

			return Redirect::to('/signup')
				->with('flash_message', 'Please, try again!')
				->withInput()
				->withErrors($validator);
		}

		
		// Save in DB

		$user = new User;
		$user->firstname    = Input::get('firstname');
		$user->lastname    = Input::get('lastname');
		$user->login        = Input::get('login');
		$user->password     = Hash::make(Input::get('password'));


		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', 'Please, try again.')
				->withInput();
		}

		// Log in

		Auth::login($user);
		
		
		return View::make('work-on-diaries')->with('flash_message', "Welcome to Children's Science Diaries");

	}




	public function getLogin() {


		return View::make('login');

	}




	public function postLogin() {

		$credentials = Input::only('login', 'password');

		if (Auth::attempt($credentials)) {
			
	
			return View::make('work-on-diaries')->with('flash_message', "Welcome to Children's Science Diaries");
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}

	
	}




	public function getLogout() {

		// Log out

		Auth::logout();


		// Send them to the homepage
		return Redirect::to('/');

	}




	
}
