<?php
    require_once("../../model/news_model.php");
    require_once( "../../controller/connectdb.php");
    $connect = new connectdb('localhost','root', '', 'DB');
    function create_table_news($connect)
    {
        $query_to_create_table_news = "CREATE TABLE IF NOT EXISTS news(id int AUTO_INCREMENT NOT NULL,
                                                                        title varchar(255),
                                                                        description TEXT,
                                                                        image varchar(10000),
                                                                        status int,
                                                                        create_at datetime,
                                                                        update_at datetime,
                                                                        PRIMARY KEY(id)
                                                                        )";
        $connect->run_query($query_to_create_table_news);
    }
    function drop_table_news($connect)
    {   
        $query_to_delete_table_news = 'DROP TABLE IF EXISTS news';
        
        $connect->run_query($query_to_delete_table_news);
    }
    function insert_into_news($connect,$news)
    {
        if(!$news[5])
            $query_insert_into_news = "INSERT INTO news(title,description, image, status, create_at, update_at) VALUES('$news[0]','$news[1]','$news[2]', $news[3], '$news[4]',null)";
        else
        $query_insert_into_news = "INSERT INTO news(title,description, image, status, create_at, update_at) VALUES('$news[0]','$news[1]','$news[2]', $news[3], '$news[4]','$news[5]')";
        $connect->run_query($query_insert_into_news);
    }
    function delete_row_from_news_byid($connect, $id)
    {
        $query_to_delete_row_by_id = "delete from news where id=$id";
        echo $query_to_delete_row_by_id;
        $connect->run_query($query_to_delete_row_by_id);
        
    }
    function insert_list_to_news($connect)
    {
        for($i=0;$i<=5;$i++)
        {
            $new = new news('title2','description2','data:image/jpeg;base64,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', 1, '2015-11-05', '2015-11-09');
            insert_into_news($connect, $new->get_all());
        }
    }
    function get_data_for_table_manage($connect, $number_page = 1, $number_rows=5)
    {
        $a = ($number_page-1)*$number_rows;
        $query_get_table_news = "select id, image, title, status from news limit $a, $number_rows";
        $result = $connect->run_query($query_get_table_news);
        echo "</br>";
        if($result->num_rows>0)
            return $result->fetch_all();
        else
            return NULL;
    }
    function count_rows_table_news($connect)
    {
        $query_to_count = "select count(*) from news";
        $result = $connect->run_query($query_to_count);
        $count =  $result->fetch_all();
        foreach($count as $value)
        {
            $co = $value[0];
        }
        return $co;
    }
    function get_a_new_byid($connect, $id)
    {
        $query_to_get_new_byid = "select * from news where id=$id";
        $result = $connect->run_query($query_to_get_new_byid);
        $data = $result->fetch_array();
        $new = new news($data[1],$data[2],$data[3],$data[4],$data[5],$data[6]);
        return $new;
    }
    function update_new($connect, $new_new)
    {
        $title = $new_new->getTitle();
        $des = $new_new->getDescription();
        $image = $new_new->getImage();
        $status= $new_new->getStatus();
        $updateat = $new_new->getUpdate_at();
        $id = $new_new->getId();
        $query_to_update = "update news set title='$title', description = '$des', image='$image', status=$status, update_at='$updateat' where id=$id";
        $connect->run_query($query_to_update);
    }
    function get_new_to_show($connect, $id)
    {
        $query = "select title, image, description from news where id=$id";
        $result = $connect->run_query($query);
        return $result->fetch_array();
    }
    if ('name'=='name')
    {
        // drop_table_news($connect);
        // create_table_news($connect);
        // insert_list_to_news($connect);
    }

?>