<?php
// Auto-lock new environments. Uses the site name, and site name + environment name as the username/password combo.

$pantheon_site = $_ENV['PANTHEON_SITE_NAME']; // The friendly name of your site, (ie: veeva-eu)
$pantheon_env  = $_ENV['PANTHEON_ENVIRONMENT']; // The name of the multidev (ie: pr-10)


if ( isset( $pantheon_env ) && isset( $_POST['environment'] ) ) {

    $data = json_encode(
      [
        'type' => 'lock_environment',  // Workflow type.
        'environment' => $pantheon_env,
        'params' => [
          "username" => $pantheon_site,
          "password" => $pantheon_site . '-' . $pantheon_env,
        ]
      ]
    );
 
    
    echo "--- Start workflow: lock_environment -- \n\n";
    $result = pantheon_curl('https://api.live.getpantheon.com/sites/self/environments/self/workflows', $data, 8443, 'POST');
    echo "--- End workflow: lock_environment -- \n\n";
    
}