<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'name', 'email', 'phone', 'message'
    ];
    public static function addComment($attributes)
    {
        return Comment::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'phone' => $attributes['phone'],
            'message' => $attributes['message'],
        ]);
    }
}
