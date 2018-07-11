<?php

namespace Helldar\Helpers\Models;

use Helldar\Helpers\Traits\FlattenException;
use Illuminate\Database\Eloquent\Model;

class ErrorNotification extends Model
{
    use FlattenException;

    protected $fillable = ['parent', 'exception'];

    /**
     * @param \Exception $value
     *
     * @throws \ReflectionException
     */
    protected function setExceptionAttribute($value)
    {
        $this->flattenExceptionBacktrace($value);

        $this->attributes['exception'] = serialize($value);
    }

    protected function getExceptionAttribute($value)
    {
        return unserialize($value);
    }
}
