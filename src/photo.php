<?php

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    public $timestamps = false;

    protected $fillable = ['title', 'description', 'img_url', 'user_id', 'upload_date'];
}
