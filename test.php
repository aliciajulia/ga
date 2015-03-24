<?php

    $arr = array(1,2,3);
    header("content-type:application/json");    
    echo json_encode($arr);