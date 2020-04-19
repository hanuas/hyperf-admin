<?php declare(strict_types=1);

if (! function_exists('old')) {
    /**
     * Retrieve an old input item.
     *
     * @param  string|null  $key
     * @param  mixed        $default
     * @return mixed
     */
    function old($key = null, $default = null)
    {
        return 'admin';
    }
}

if (! function_exists('is_valid_url')) {
    /**
     * 判断url是否合法
     *
     * @param  string   $url
     * @return boolean
     */
    function is_valid_url($url)
    {
        if (! preg_match('~^(#|//|https?://|mailto:|tel:)~', $url)) {
            return filter_var($url, FILTER_VALIDATE_URL) !== false;
        }

        return true;
    }
}
