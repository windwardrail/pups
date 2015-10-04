<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function pictures() {
    	return $this->hasMany('App\Picture');
    }

    public function updates(){
        return $this->hasMany('App\Update');
    }

	public function donors() {
		return $this->hasMany('App\Donor');
	}

	public function getDefaultImage(){
    	$images = $this->pictures;
    	if ($images->count() < 2) {
    		return $images->first();
    	} else {
    		$defaultImage = $images->first(function($key, $image) {
    			return $image->is_default == 1;
    		});
    		if (is_null($defaultImage)) {
    			$defaultImage = $images->first();
    		}
    		return $defaultImage;
    	}
    }

    public function getDefaultImageURL($size = Picture::ORIGINAL) {
    	$defaultImage = $this->getDefaultImage();
		$path = '/uploads/pets/' . $size . '/';
    	return is_null($defaultImage) ? '' : $path . $defaultImage->url;
    }
}
