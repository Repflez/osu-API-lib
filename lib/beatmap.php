<?php
/**********************************************************
 * beatmap.php - osu!APIlib
 *
 * This file handles quering osu!api for beatmaps.
 *
 * The single method (for now) queries the API and returns
 * an array with the specified data.
 ***********************************************************/

function osu_get_beatmap($since = 0, $mapset_id = 0, $cacheLength = 6) {
    global $osuPath, $apiKey, $apiPath;
    // Setup the remote path to call
    if ($since) {
        $fullPath = $osuPath . 'get_beatmaps?since='. $since . '&k=' . $apiKey;
    } else {
        $fullPath = $osuPath . 'get_beatmaps?s='. $mapset_id . '&k=' . $apiKey;
    }
    // Setup the local path to save the cached results
    if ($since) {
        $fileName   = $apiPath . '/cache/beatmaps/'. $since . '.txt';
    } else {
        $fileName   = $apiPath . '/cache/beatmaps/'. $mapset_id . '.txt';
    }
    // Call the API and return the results
    return get_content($fileName,$fullPath, $cacheLength);
}
