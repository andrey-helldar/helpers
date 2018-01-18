<?php

namespace Helldar\Helpers\Traits;

use Illuminate\Contracts\Support\Jsonable as JsonableSupport;

/**
 * Class Jsonable
 *
 * @see https://gist.github.com/Ellrion/2c7648d3ebdef2cd8ed24ffa78cf1d3d
 */
class Jsonable implements JsonableSupport
{
    /**
     * @var mixed
     */
    protected $dataToJson;

    /**
     * Set a value;
     *
     * @param $data
     *
     * @return $this
     */
    protected function setData($data)
    {
        $this->dataToJson = $data;

        return $this;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     *
     * @return mixed|string
     */
    public function toJson($options = 0)
    {
        return $this->dataToJson;
    }
}
