<?php 

class DiaryController extends BaseController {
	
	public function __construct() {

		parent::__construct();
	
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	
	
	
	public function getCreate() {


		return View::make('create-diary');
	}

	

	public function postCreate() {
                 

		// Rules
			
		$rules = array(
			'title' => 'required',
			'keywords' => 'required|max:60'
		);

		// Validation
		
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {

			return Redirect::to('getCreate')
				->with('flash_message', 'Please, try again!')
				->withInput()
				->withErrors($validator);
		}
		
		// Save in DB		

		$diary = new Diary;

		$diary->title   = Input::get('title');
		$diary->keywords = Input::get('keywords');
		$diary->user()->associate(Auth::user()); 	  
		
		
		$diary->save();

		//

		return View::make('work-on-diaries')->with('flash_message', "Your diary has been created!");
			
		
	}



	public function getList() {
		
		
		$listdiaries = Diary::listuserdiaries();
		
		if (empty($listdiaries)){
		
			return View::make('no-diaries');	
		}
		else {
		
			return View::make('list-diaries')->with('listdiaries', $listdiaries);
		}
		
	}


	public function postList() {
	
		$diaryid = Input::get('diary_id');

		$diary = Diary::selectdiary($diaryid);
		
	
		return View::make('list-selected-diary')->with('diary',$diary);
	}



	public function getIndex() {

		return View::make('work-on-diaries');
	}

	

}