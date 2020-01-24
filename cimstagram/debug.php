<?php
//phpinfo();
$cook = setcookie("user2", "muchomucho", time()+3600, "/");
var_dump($_COOKIE);
?>
<script type="text/javascript">
var arr =[1,2,3];
//   for (i = 0; i < arr.length; i++){
//     setTimeout(function(){
// console.log(i + ' ' + arr[i]);
//      }, 3000);
//
//   }

  for (var i = 1; i <= arr.length; i++) {
(function(index) {
setTimeout(function() { console.log(index); }, i*3000);
})(i);
}
</script>