<?php

namespace Helldar\Helpers\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorNotification extends Model
{
    protected $fillable = ['parent', 'exception'];

    protected function setExceptionAttribute($value)
    {
        $this->attributes['exception'] = serialize($value);
    }

    protected function getExceptionAttribute($value)
    {
        return unserialize($value);
    }
}
