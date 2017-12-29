<?php
/**
 * Created by PhpStorm.
 * User: Piyachet Kanda
 * Date: 11/14/2017
 * Time: 4:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    protected $fillable = ['id', 'name', 'description', 'points', 'secret', 'admin', 'scanCount', 'tags'];
    protected $table = 'booths';

    protected $casts = [
        'admin' => 'array',
        'tags' => 'array'
    ];

    public $timestamps = true;
}