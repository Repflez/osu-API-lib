<?php
/**********************************************************
 * user.php - osu!APIlib
 *
 * This file handles quering osu!api for users.
 *
 * The single method (for now) queries the API and returns
 * an array with the specified data.
 ***********************************************************/

/*
 *  osu!api expects $mode's number to be 0-3
 *
 *  This method ensures that is the case.
 *
 *  $mode can be:
 *  0 - osu!standard
 *  1 - Taiko
 *  2 - Catch the Beat
 *  3 - osu!mania
 */
function osu_get_user($user, $mode = 0, $cacheLength = 6) {
    global $osuPath, $apiKey, $apiPath;
    if (!$user)     return 'Specify a user first!';
    if ($mode > 3)  return 'Mode non-existant.';
    // Setup the remote path to call
    $fullPath = $osuPath . 'get_user?u='. $user . '&m=' . $mode . '&k=' . $apiKey;
    // Setup the local path to save the cached results
    $fileName   = $apiPath . '/cache/user/'. $user . '-' . $mode . '.txt';
    // Call the API and return the results
    return get_content($fileName, $fullPath, $cacheLength);
}
