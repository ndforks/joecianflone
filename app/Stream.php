<?php
namespace JoeCianflone;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table    = 'streams';

    protected $dates    = ['item_created_at', 'created_at', 'updated_at'];
    protected $fillable = ['id', 'item_id', 'type', 'is_pinned', 'slug', 'meta', 'content', 'revision', 'item_created_at'];

    protected $casts    = [
       'meta'      => 'array',
       'content'   => 'array',
       'is_pinned' => 'boolean',
    ];

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    public function getContentAttribute($value)
    {
        return json_decode($value);
    }

    public function getMetaAttribute($value)
    {
        return json_decode($value);
    }
}
