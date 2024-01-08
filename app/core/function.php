<?php



 function show($st){
    echo"<pre>";
    print_r($st); 
    echo"</pre>";
}
function redirect($path){
    header("location:".ROOT."/".$path);
}
?>