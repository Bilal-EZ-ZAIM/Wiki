<?php

class Functions {


   STATIC public function redirect($path){
        header("location:".ROOT."/".$path);
    }
    STATIC public function show($st){
        echo"<pre>";
        print_r($st); 
        echo"</pre>";
    }
}




?>