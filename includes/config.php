<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $config = [
        'name' => 'बैगा स्वास्थ्य परीक्षण शिविर',
        'site_url' => 'http://3.109.136.34/baigaSwasthyaShivir',
        'pretty_uri' => false,
        'nav_menu' => [
            'home' => 'Home'
        ],
        'template_path' => 'template',
        'content_path' => 'content',
        'version' => 'v0.1',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
