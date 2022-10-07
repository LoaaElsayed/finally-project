<?php

function testmessage($condation , $message){
if($condation){
    echo "<div class='alert mt-5 mx-auto w-50 pt-5 alert-success'>
    $message success
    </div>";
}else{
    echo "<div class='alert mt-5 mx-auto w-50 pt-5 alert-danger'>
    $message failed
    </div>";
}


}



function go($path){
    echo "<script>
    window.location.replace('/testinstant/$path');
    </script>";
}



function auth(){
    if(isset($_SESSION['admin'])){




    }else{
      go("pages-login.php");
    
    }
    
}

auth();

