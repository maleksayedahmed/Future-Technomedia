<?php

if (!function_exists('setting')) {
    /**
     * Get a setting value by key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('settings')) {
    /**
     * Get settings by group or all settings
     *
     * @param string|null $group
     * @return array
     */
    function settings($group = null)
    {
        if ($group) {
            return \App\Models\Setting::getByGroup($group);
        }
        
        return \App\Models\Setting::getAllSettings();
    }
}
