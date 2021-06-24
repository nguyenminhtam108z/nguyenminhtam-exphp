<?php
 require_once("../../controller/newsController.php");
  if(count($_GET))
  {
    if($_GET["title"])
      $title= $_GET["title"];
    if($_GET["description"])
        $description = $_GET["description"];
    if($_GET["image"])
        $image = $_GET["image"];
    $status = $_GET["status"];
    $createat =  date('Y-m-d H:i:s');
    $updateat = NULL;
    $new = new news($title, $description, $image, $status,$createat, $updateat);
    insert_into_news($connect, $new->get_all());
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="http://localhost/baitapphp/view/"/>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css_add_new.css">
  </head>
  <body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET"> 
      <div class="form-header">
        <div class="div-label">
          <h1>ADD NEW</h1>
        </div>
        <div class="div-button">
          <a href="http://localhost/baitapphp/mvc/admin/manage.html-5-page=1"> <button type="button" class="btn-back">BACK</button></a>
          <button type="button" class="btn-show">SHOW</button>
        </div>
    </div>
      <div class="form-group">
          <div class="div-label">
            <label>Title</label>
          </div>
          <div class="div-input">
            <input type="text" class="form-control" name="title" width="40%">
          </div>
      </div>
      <div class="form-group">
        <div class="div-label">
          <label>Decription</label>
        </div>
        <div class="div-input">
          <textarea class="form-control" name="description" rows="12" cols="50"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="div-label">
          <label>Image</label>
        </div>
        <div class="div-input">
          <div><input type="file" id="inputFileToLoad" class="form-control-file"></div>
          <input type="text" name="image" value="<?php if(isset($new)) echo $new->getImage(); ?>" id="img-bs64" style="display:none;">
          <img src="<?php if(isset($new)){echo $new->getImage();} ?>" <?php if(empty($new)) echo 'style="display:none;"'; ?> id="img" width="80px" height="80px">
        </div>
      </div>
      <div class="form-group">
        <div class="div-label">
         <label>Status</label>
        </div>
        <div class="div-input">
          <select class="cbx-number-rows" name="status">
            <option value="1">Able</option>
            <option value="0" selected="selected">Enabled</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <div class="div-label">
        </div>
        <div class="div-input">
          <button type="submit" class="btn btn-ADD">ADD</button>
        </div>
      </div>
    </form>
  </body> 
</html>
<script>
  function encodeImageFileURL() {
      var fileSelected = document.getElementById("inputFileToLoad").files;
      if (fileSelected.length>0) {
          var fileToLoad = fileSelected[0];
          var fileReader = new FileReader();
          
          fileReader.onload = function (FileLoadEvent) {
              var base64value = FileLoadEvent.target.result;
              var src_img = document.getElementById("img")
              document.getElementById("img-bs64").value = base64value;;
              src_img.value = base64value;
              src_img.style.display="block";
          };
          fileReader.readAsDataURL(fileToLoad);
          document.getElementById('inputFileToLoad').value(base64value);
      }
  }

  var fileUp = document.getElementById("inputFileToLoad");
  fileUp.addEventListener("change", function () {
      encodeImageFileURL();
  })
</script>