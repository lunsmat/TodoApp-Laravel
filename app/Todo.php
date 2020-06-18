<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{

    // protected $table = 'todos'; // This can tell to model the name of the table in database. If not put the name of the table will be the name of the model in plural form with lower case letters
    // protected $primaryKey = 'id'; // TThis can tell to model the name of the primary key in table, if not put the primary key will be id
    // protected $incrementing = true; // This can tell to model if auto_increment is true. If not put the auto_increment will be true
    // protected $keyType = 'int'; // This can tell to model the type of the primary key

    public $timestamps = false; // This can tell to model if exists timestamps fields in database. If not put the value will be true

    // const CREATED_AT = 'date_created'; // This can tell to model that timestamp created_at have other name in database
    protected $fillable = ['title']; // This can tell to model that fields that can make alteration in mass.

}
