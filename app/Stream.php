<?php

namespace JoeCianflone;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'streams';

    protected $fillable = ['id', 'item_id', 'type', 'is_pinned', 'meta', 'content', 'item_created_at'];

    protected $dates = ['item_created_at', 'created_at', 'updated_at'];

    protected $casts = [
       'is_pinned' => 'boolean',
       'content' => 'array',
       'meta' => 'array'
    ];

    // public function getContentAttribute($value)
    // {
    //    return json_decode($value);
    // }

    // public function getMetaAttribute($value)
    // {
    //    return json_decode($value);
    // }
}
