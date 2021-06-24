<?php
    require_once( "../../controller/newsController.php");
    if(isset($_GET["id"]))
    {
        $data = get_new_to_show($connect, $_GET["id"]);

    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/baitapphp/view/"/>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_show.css">
  </head>
  <body>
    <div class="main-container">
      <div class="header">
        <div class="header-title"><h1><?php if(isset($data)) echo $data[0]; ?></h1></div>
        <div class="header-button"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"> <button class="btn-back">BACK</button></a></div>
      </div>
      <div class="content">
       <div class="show-image"> <img src="<?php if(isset($data)) echo $data[1]; ?>" width="120px" height="120px"></div>
       <div class="show-description"><p><?php if(isset($data)) echo $data[2]; ?></p></div>
      </div>
    </div>
  </body> 
</html>