<?php
  consoleMsg("env.php file LOADED!");

$domain = $_SERVER['HTTP_HOST'];

consoleMsg("Domain is: $domain");

if ($domain == 'localhost:8888') {
// Specific to the current environment you're on.
  $APP_CONFIG = [
    'environment' => 'local',
    'site_url' => 'http://localhost:8888/',
    'database_host' => 'localhost',
    'database_user' => 'root',
    'database_pass' => 'root',
    'database_name' => 'idm232',
  ];
} else {
    $APP_CONFIG = [
        'environment' => 'live',
        'site_url' => 'https:/gavinc.us/',
        'database_host' => 'mysql.gavinc.us',
        'database_user' => 'gavinscookbook',
        'database_pass' => '!23Gabino23!',
        'database_name' => 'gavinscookbook_idm232',
      ];
}

  


?>