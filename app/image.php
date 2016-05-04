<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{

    protected $table='images';

    protected $fillable = ['categories_id', 'file_name', 'file_path', 'file_size'];

    public function category()
    {
        return $this->belongsTo('App\categories');
    }
}
