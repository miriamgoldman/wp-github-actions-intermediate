<?php
// Auto-lock new environments.

$pantheon_site = $_ENV['PANTHEON_SITE_NAME'];
$pantheon_env  = $_ENV['PANTHEON_ENVIRONMENT'];


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

    var_dump( $data );
    
    /*
    echo "--- Start workflow: lock_environment -- \n\n";
    $result = pantheon_curl('https://api.live.getpantheon.com/sites/self/environments/self/workflows', $data, 8443, 'POST');
    echo "--- End workflow: lock_environment -- \n\n";
    */
}