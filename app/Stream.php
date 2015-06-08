<?php

namespace JoeCianflone;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'streams';

    protected $fillable = ['id', 'meta_data', "data", "social_type", "is_pinned", "social_created_at", "social_id"];

    protected $dates = ["social_created_at", "created_at", "updated_at"];

    public function getData($value)
    {
       return json_decode($value);
    }

    public function getMetaData($value)
    {
       return json_decode($value);
    }
}
