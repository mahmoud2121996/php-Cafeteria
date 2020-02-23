<?php
    // session_destroy();
    session_start();
    $db_config = parse_ini_file('config.sample.ini');
    //var_dump($db_config);

    // echo "mysql:host={$db_config['db_host']};"."dbname={$db_config['db_name']};"."port={$db_config['db_port']};";
    $conn = new PDO("mysql:dbname={$db_config['db_name']};".
                            "host={$db_config['db_host']};".
                            "port={$db_config['db_port']};",
                            $db_config['db_user'],
                            $db_config['db_pass']);

    $_SESSION["conn"] = $conn;
    $_SESSION["test"] = $db_config;
    
    //var_dump($_SESSION);

?>