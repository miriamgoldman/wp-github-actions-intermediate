<?php
// Auto-lock new environments.

var_dump( $_ENV );

$pantheon_site = '';
$pantheon_env  = '';


if ( defined( 'PANTHEON_ENVIRONMENT' ) && isset( $_POST['environment'] ) ) {

    $data = json_encode(
      [
        'type' => 'lock_environment',  // Workflow type.
        'environment' => PANTHEON_ENVIRONMENT,
        'params' => [
          "username" => PANTHEON_SITE_NAME,
          "password" => PANTHEON_SITE_NAME . '-' . PANTHEON_ENVIRONMENT,
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