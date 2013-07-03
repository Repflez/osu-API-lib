<?php
/**********************************************************
 * file.php - osu!APIlib
 *
 * This file handles files and the caching of them.
 *
 * If the file doesn't exists, osu!APIlib calls osu!'s
 * server with the corresponding query and saves the result
 * in the specified folder.
 *
 * Credits to David Walsh for the methods on this file.
 * http://davidwalsh.name/php-cache-function
 ***********************************************************/

function get_content($file, $url, $hours = 6, $fn = '', $fn_args = '') {
  //vars
  if(file_exists($file)) {
    $current_time = time(); $expire_time = $hours * 60 * 60; $file_time = filemtime($file);
  }
  //decisions, decisions
  if(file_exists($file) && ($current_time - $expire_time < $file_time)) {
    return file_get_contents($file);
  } else {
    $content = get_url($url);
    if($fn) { $content = $fn($content,$fn_args); }
    file_put_contents($file,$content);
    return $content;
  }
}

function get_url($url) {
  global $appName, $appURL, $appVersion, $appEmail;
  // Do we have cURL installed?
  if (function_exists('curl_init')) {
    $ch = curl_init();
    $options = array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
      CURLOPT_USERAGENT =>  $appName . '/' . $appVersion . ' (' . $appURL . '; ' . $appEmail . ') osu!APIlib (https://github.com/Repflez/osu-API-lib)',
    );
    curl_setopt_array( $ch, $options );
    $content = curl_exec($ch);
    curl_close($ch);
  } else {
    // No, use the slower file_get_contents.
    $content = file_get_contents($url);
  }
  return $content;
}
