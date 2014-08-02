<?php

class Page extends Eloquent {
	
			# Relationship method - Page belongs to diary

    			public function diary() {
    
	    			return $this->belongsTo('Diary');
    			}

}