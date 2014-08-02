<?php

class Diary extends Eloquent {
	
			# Relationship method - Diary belongs to user
    			
			public function user() {
    
	    			return $this->belongsTo('User');
    			}

			# Relationship method - Diary has many pages
			
			public function pages() {

        			return $this->hasMany('Page');
        
    			}

			
			public static function listuserdiaries() {
	
				$diaries    = Array();
			
				$userid = Auth::user()->id;

				$itens = Diary::where('user_id', 'LIKE', $userid)->get();


				foreach($itens as $diary) {
					$diaries[$diary->id] = $diary->title;
				
				}	

				return $diaries;	
			}

			
			public static function selectdiary($diaryid) {
				
				$diaries = Diary::with('pages')->where('id', 'LIKE', $diaryid)->get();

				return $diaries;
			}

	
			public static function selectbykey($key) {
				
				$diaries = Diary::with('pages')->where('keywords', 'LIKE', $key)->get();

				return $diaries;
			}




}