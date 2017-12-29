<?php
/**
 * Created by PhpStorm.
 * User: Piyachet Kanda
 * Date: 11/14/2017
 * Time: 4:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['id', 'prefix', 'firstName', 'lastName', 'picture', 'email', 'gender', 'school', 'studentYear', 'type', 'points', 'scanned', 'registered', 'interests'];
    protected $table = 'accounts';

    protected $casts = [
        'scanned' => 'array',
        'registered' => 'boolean',
        'interests' => 'array'
    ];

    public $incrementing = false;
    public $timestamps = true;
}