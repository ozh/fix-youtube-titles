<?php
/*
Plugin Name: Fix Youtube titles
Plugin URI: https://github.com/ozh/fix-youtube-titles/
Description: Get correct Youtube video titles
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();

// Add filters if we're trying to get a page title from Youtube
yourls_add_filter('shunt_get_remote_title', 'ozh_is_youtube_url');
function ozh_is_youtube_url($false, $url) {
    // is this a youtube.com URL ?
    if( strpos($url, 'youtube.com') > 0 ) {
        // change user agent to "curl". Actually, this is enough to trick Youtube ¯\_(ツ)_/¯
        yourls_add_filter('http_user_agent', function(){return 'curl/7.68.0';});

        // The <title> tag in Youtube pages is buried down the page : lift limit of bytes retrieved
        yourls_add_filter('get_remote_title_max_byte', function(){return '';});

        // Extra trick : fake the cookie that Youtube expects (requires YOURLS 1.8.2+)
        yourls_add_filter('http_request_headers', 'ozh_youtube_add_consent');
    }

    // We don't want to actually interrupt the flow of event so we return false
    return $false;
}

// Add a cookie header to the HTTP request
function ozh_youtube_add_consent($in) {
    $in['Cookie']='CONSENT=YES+1337';
    return $in;
}

