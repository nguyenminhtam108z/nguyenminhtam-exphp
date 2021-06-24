<?php
    require_once( "../../controller/newsController.php");
    if(!$_GET["row"])
    {
        $_GET["row"] = 5;
    }
    if(isset($_GET["id"]))
    {
        delete_row_from_news_byid($connect, $_GET["id"]);
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }

        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost/baitapphp/view/"/>
        <title></title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="css/css_manage.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <div class=header-left><h1>Manager</h1></div>
                <div class=header-right><a href="http://localhost/baitapphp/mvc/admin/add"><button class="btn-new">New</button></a></div>
            </div>
            <div class="content">
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Thump</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <?php
                        if(isset($_GET["page"]))
                            $number_page = $_GET["page"];
                        else
                            $number_page = 1;
                        $data = get_data_for_table_manage($connect,$number_page, $_GET["row"]);
                        foreach($data as $key => $value)
                        {
                      ?>
                      <tr>
                          <td><?php echo $value[0]; ?></td>
                          <td><img src="<?php echo $value[1]; ?>" width="60px" height="60px"/></td>
                          <td><?php echo $value[2]; ?></td>
                          <td>
                          <?php
                          if($value[3])
                                echo "Able";
                            else
                                echo "Enabled";
                          ?>
                          </td>
                          <td><a href="http://localhost/baitapphp/mvc/show.html-id=<?php echo $value[0]; ?>">Show</a> | <a href="http://localhost/baitapphp/mvc/admin/edit-id=<?php echo $value[0]; ?>">Edit</a> | <a href="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $value[0]; ?>">Delete</a></td>
                      </tr>
                      <?php
                        }
                      ?>
                </table>
                <div class="number-page">
                    <div class="choose-number-rows">
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
                        <p>Page:</p>
                        <select class="cbx-number-rows" name="row" onchange="this.form.submit()">
                            <option value="5" <?php if($_GET["row"]==5) echo 'selected="selected"'; ?>>5</option>
                            <option value="10" <?php if($_GET["row"]==10) echo 'selected="selected"'; ?>>10</option>
                            <option value="50" <?php if($_GET["row"]==50) echo 'selected="selected"'; ?>>50</option>
                            <option value="<?php $count = count_rows_table_news($connect); echo $count; ?>"  <?php if($_GET["row"]==$count) echo 'selected="selected"'; ?> >All</option> 
                        </select>

                    </form>
                    </div>
                    <div class="choose-number-page">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><<</a></li>
                        <?php  
                            $num = ceil($count/$_GET["row"]);
                            for($i=1;$i<=$num;$i++)
                            {  
                        ?>
                        <li class="page-item"><a class="page-link" href="http://localhost/baitapphp/mvc/admin/manage.html-<?php echo $_GET["row"];  ?>-page=<?php echo $i;  ?>"><?php echo $i; ?></a></li>
                        <?php 
                            }
                        ?>
                        <li class="page-item"><a class="page-link" href="#">>></a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
