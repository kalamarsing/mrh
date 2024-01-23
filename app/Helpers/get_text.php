<?php

if (!function_exists('get_text')) {
    function get_text($key)
    {
        $text = App\Entities\PageField::where('identifier', $key)->first();
        if (!isset($text)) {
            return '';
        }

        if (!$text) {
            return '';
        }

        return $text->value;
    }
}
