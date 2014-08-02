<?php 

class PageController extends BaseController {
	
	public function __construct() {

		parent::__construct();
	}
	
	
	
	
	public function getAddData($id) {

		$diary = Diary::selectdiary($id);	

		return View::make('add-page-form')->with('diary',$diary);
			
	}


	public function postAddData($id) {
		
		$page = new Page();

		$page->info = Input::get('info');

		$page->picture = Input::get('picture');

		$page->diary_id = $id;
		
		$page->save();

		$diary = Diary::selectdiary($id);

		return View::make('list-selected-diary')->with('diary',$diary);			
	}

}