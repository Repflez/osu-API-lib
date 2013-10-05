<?php
/**********************************************************
 * match.php - osu!APIlib
 *
 * This file handles quering osu!api for multiplayer
 * matches.
 *
 * The single method (for now) queries the API and returns
 * an array with the specified data.
 ***********************************************************/

function osu_get_match($match_id, $cacheLength = 6) {
    global $osuPath, $apiKey, $apiPath;
    if (!$match_id)     return 'Specify a multiplayer match id first!';
    // Setup the remote path to call
    $fullPath = $osuPath . 'get_match?mp='. $match_id . '&k=' . $apiKey;
    // Setup the local path to save the cached results
    $fileName   = $apiPath . '/cache/multiplayer/match/'. $match_id . '.txt';
    // Call the API and return the results
    return get_content($fileName, $fullPath, $cacheLength);
}
