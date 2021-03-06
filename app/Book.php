<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string book_pages
 * @property string book_author
 * @property string book_name
 * @property string book_price
 * @property string book_category
 * @property string book_code
 * @property array|string user_id
 */
class Book extends Model
{
    protected $table = 'books';

    //public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
