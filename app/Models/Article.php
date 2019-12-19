<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    use SoftDeletes; // Silinen verileri geri kurtarabilmek adına.

    public function getCategory(){
      return $this->hasOne('App\Models\Category','id','categoryId');
    }

}
