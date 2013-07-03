<?php
/**********************************************************
 * beatmap.php - osu!APIlib
 *
 * This file handles quering osu!api for beatmaps.
 *
 * The single method (for now) queries the API and returns
 * an array with all beatmaps in the set (unless $beatmap_id
 * is used)
 ***********************************************************/

function osu_get_beatmap($since = 0, $mapset_id = 0, $beatmap_id = 0, $cacheLength = 6) {
    global $osuPath, $apiKey, $apiPath;
    // Setup the remote path to call
    if ($since) {
        $fullPath = $osuPath . 'get_beatmaps?since='. $since . '&k=' . $apiKey;
    } elseif ($mapset_id) {
        $fullPath = $osuPath . 'get_beatmaps?s='. $mapset_id . '&k=' . $apiKey;
    } elseif ($beatmap_id) {
        $fullPath = $osuPath . 'get_beatmaps?b='. $beatmap_id . '&k=' . $apiKey;
    } else {
        return 'No specified.';
    }
    // Setup the local path to save the cached results
    if ($since) {
        $fileName   = $apiPath . '/cache/beatmaps/'. $since . '.txt';
    } elseif ($beatmap_id) {
        $fileName   = $apiPath . '/cache/beatmaps/m-'. $beatmap_id . '.txt';
    } else {
        $fileName   = $apiPath . '/cache/beatmaps/b-'. $mapset_id . '.txt';
    }
    // Call the API and return the results
    return get_content($fileName,$fullPath, $cacheLength);
}
