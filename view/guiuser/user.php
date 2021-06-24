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
        <link rel="stylesheet" href="css/css_user.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="main-container">
            <div class="header">
                <div class=header-left><h1>LIST POST:</h1></div>
            </div>
            <div class="content">
                <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 5%;">ID</th>
                        <th style="width: 10%;">Thump</th>
                        <th style="width: 30%;">Title</th>
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
                          <td> <?php echo $value[0]; ?></td>
                          <td><a href="http://localhost/baitapphp/mvc/show.html-id=<?php echo $value[0]; ?>"><img src="<?php echo $value[1]; ?>" width="60px" height="60px"/></a></td>
                          <td><?php echo $value[2]; ?></td>
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
                            <option value="5" <?php if( $_GET["row"]==5) echo 'selected="selected"'; ?>>5</option>
                            <option value="10" <?php if( $_GET["row"]==10) echo 'selected="selected"'; ?>>10</option>
                            <option value="50" <?php if( $_GET["row"]==50) echo 'selected="selected"'; ?>>50</option>
                            <option value="<?php $count = count_rows_table_news($connect); echo $count; ?>"  <?php if($_GET["row"]==$count) echo 'selected="selected"'; ?> >All</option> 
                        </select>

                    </form>
                    </div>
                    <div class="choose-number-page">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><<</a></li>
                        <?php  
                            $num = ceil($count/ $_GET["row"]);
                            for($i=1;$i<=$num;$i++)
                            {  
                        ?>
                        <li class="page-item"><a class="page-link" href="http://localhost/baitapphp/mvc/user/listnews.html-<?php echo $_GET["row"]; ?>-page=<?php echo $i;?>"><?php echo $i; ?></a></li>
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
