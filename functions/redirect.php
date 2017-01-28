<?php
 
    if( isset($_GET['id']) ){
 
        $id = $_GET['id'];
 
        if( file_exists("../links/$id.txt") ){
            $get_long_link = file_get_contents("../links/$id.txt");
            
            $a = 'http://' or 'https://';

            if (strpos($a, $get_long_link) == false) {
                $realurl = "http://" . $get_long_link;
            } else {
                $realurl = $get_long_link;
            }
            
            header("location: $realurl");
        }else{
            header("location: ../index.php");
        }
 
    }
 
    else{
        header("location: ../index.php");
    }
 
?>