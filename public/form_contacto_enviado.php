
<?php
/**
 * 
 * 
 * 
 */


  header( "refresh:3;url=index.php" );
  
?>

<h1>Se ha enviado el fomulario</h1>
<h2 id="timer"></h2>
<script>
let count = 3;
  setInterval(function(){ 
    document.getElementById('timer').innerHTML="sera redirigido en: "+count;
    count--; 
    }, 1000);

</script>