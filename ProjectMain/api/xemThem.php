<?php
     include "../lib/db2.php";
    // xem them bai viet
    $query ="select * from post order by `date` desc limit 0,10";
    $a = DP::run_query($query,[],2);
    echo json_encode($a);

?>