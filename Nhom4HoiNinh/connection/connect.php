<?php 
    define('PG_DB', "BTL2"); 
    define('PG_HOST', "localhost"); 
    define('PG_USER', "postgres"); 
    define('PG_PORT', "5433"); 
    define('PG_PASS', "26102001"); 

    $conn = pg_connect("dbname=".PG_DB." password=".PG_PASS." host=".PG_HOST." user=".PG_USER." port=".PG_PORT);
    
    if(!$conn) {
        echo "conectj xit";
    }

    
   

?>