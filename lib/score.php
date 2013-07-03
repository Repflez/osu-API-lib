<?php
/**********************************************************
 * score.php - osu!APIlib
 *
 * This file handles quering osu!api for scores.
 *
 * The single method (for now) queries the API and returns
 * the top 50 scores of a specific beatmap.
 ***********************************************************/

function osu_get_scores($beatmap_id = 0, $mode = 0, $cacheLength = 6) {
    global $osuPath, $apiKey, $apiPath;
    if (!$beatmap_id)   return 'Specify a beatmap_id first!';
    if ($mode > 3)      return 'Mode non-existant.';
    // Setup the remote path to call
    $fullPath = $osuPath . 'get_scores?b='. $beatmap_id . '&m=' . $mode . '&k=' . $apiKey;
    // Setup the local path to save the cached results
    $fileName = $apiPath . '/cache/scores/'. $beatmap_id . '-' . $mode . '.txt';
    // Call the API and return the results
    return get_content($fileName,$fullPath, $cacheLength);
}
