<?php   
    $db_config = parse_ini_file('config.sample.ini');
 
    $conn = new PDO("mysql:dbname={$db_config['db_name']};".
                            "host={$db_config['db_host']};".
                            "port={$db_config['db_port']};",
                            $db_config['db_user'],
                            $db_config['db_pass']);



   

