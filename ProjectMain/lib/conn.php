<?php
    include_once ('test.php');
   
    echo "<pre>";
        print_r(DP::run_query('select * from post',[],2));
    echo "</pre>";
  
?>