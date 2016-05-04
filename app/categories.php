<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    public function images()
    {
        return $this->hasMany('App\image');
    }

    //protected $fillable=['file_name','file_size','file_path'];
}
