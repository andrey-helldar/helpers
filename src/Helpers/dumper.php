<?php

if (!function_exists('dd_sql')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param      $query
     * @param bool $is_short
     * @param bool $is_return
     *
     * @return array|string
     */
    function dd_sql($query, bool $is_short = false, bool $is_return = false)
    {
        return \Helldar\Helpers\Support\Dumper::ddSql($query, $is_short, $is_return);
    }
}
