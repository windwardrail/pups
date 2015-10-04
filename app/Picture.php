<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {
    /* Resized picture types and their corresponding folder name */
    const ORIGINAL = 'original';
    const SQUARE = 'square';
    const CAROUSEL = 'carousel';

    public function pet() {
        return $this->belongsTo("App\Pet");
    }

    public function getImage($size = Picture::ORIGINAL) {
      $path = '/uploads/pets/' . $size . '/';
      return is_null($defaultImage) ? '' : $path . $this->url;
    }
}
