<?php

// Danh sách cái category
    $listCate = DP::run_query('select * from category',[],2);

// Danh sách các bài viết 
    $query ="select * from post order by `date` desc limit 0,5";
    $paras =[]; 
    if(isset($_GET['cat'])){
         $query ="select * from post p join post_category pc
                on p.id = pc.id_post
                where pc.id_category =? 
                order by `date` desc limit 0,5";
        array_push($paras,$_GET['cat']);
    }
    $listPost = DP::run_query($query,$paras,2);
?>