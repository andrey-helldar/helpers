<?php

namespace Helldar\Helpers\Support;

use Illuminate\Database\Eloquent\Builder;

class Dumper
{
    /**
     * @var string
     */
    private $query;

    /**
     * Dumper constructor.
     *
     * @param $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Dump the passed variables and end the script.
     *
     * @param bool $is_short
     * @param bool $is_return
     *
     * @see https://gist.github.com/Ellrion/561fc48894a87b853917e0a5cec83181#file-helper-php Original Source
     *
     * @return array|string
     */
    public function ddSql(bool $is_short = false, bool $is_return = false)
    {
        if ($this->query instanceof Builder) {
            $this->query = $this->query->getQuery();
        }

        $sql = $this->query->toSql();

        $bindings = array_map(function ($binding) {
            return is_int($binding) || is_float($binding) ? $binding : "'{$binding}'";
        }, $this->query->getBindings());

        $raw      = vsprintf(str_replace(['%', '?'], ['%%', '%s'], $sql), $bindings);
        $bindings = $this->query->getRawBindings();

        if ($is_return) {
            return $is_short ? $raw : compact('sql', 'bindings', 'raw');
        }

        dd($is_short ? $raw : compact('sql', 'bindings', 'raw'));
    }
}
