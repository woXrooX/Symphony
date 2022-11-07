<?php
///////////////// Front / GET
Symphony\HTML::setTitle("Home");
Symphony\HTML::addJavaScript("main");

function onGET(){
  return "HOME";

}

///////////////// Back / POST
function onPOST(){
  return "POST";

}

?>
