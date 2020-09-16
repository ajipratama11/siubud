<?php 
    if(isset($_SESSION['msg'])){
        echo "<div class='alert alert-primary'><b><span class='fa fa-check-circle'></span> ".$_SESSION['msg']."</b></div>";
    }
?>
