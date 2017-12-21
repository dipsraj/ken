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
 */
class Book extends Model
{
    protected $table = 'books';

    //public $timestamps = false;
}
