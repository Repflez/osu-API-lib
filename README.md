osu!APIlib
===========

osu!APIlib is a simple library to interface with osu!api.

Initialization
==============

To initialize osu!APIlib, you must fill the configuration (Add these at any part before osu!APIlib is included) with your osu! key. You can get your key here: https://osu.ppy.sh/p/api

````
  // Your app's name
  $appName    = 'My osu! app';
  // Your app's URL
  $appURL     = 'http://example.com';
  // Your app's version number
  $appVersion = '1.0';
  // Your e-mail (This is sent to the server)
  $appEmail   = 'user@example.com';
  // Your osu! API Key
  $apiKey     = 'api key';
  // osu!APIlib path in the server
  $apiPath    = '/your/path/to/osu!APIlib';
  // osu!'s API URL (Don't modify this unless osu! changes URL)
  $osuPath    = 'https://osu.ppy.sh/api/';
````

To include osu!APIlib, add this line in your php script:
````
include_once( $apiPath . '/osu!api.php' );
````

Usage
=====

TODO
