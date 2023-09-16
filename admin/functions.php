<?php

function insert_categories(){

    global $connection;
    if(isset($_POST["cat_insert"])){
        $cat_title = $_POST["cat_title"];

        if($cat_title == "" || empty($cat_title)){
            echo "Category should not be empty!";
        }else{
            $insert = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";
            $insert_res = mysqli_query($connection, $insert);
            if(!$insert_res){
                echo "<h1>Categories can not be inserted!</h1>";
            }
        }
        
    }
}

function findAllCategories(){
    
    global $connection;
    
    $select_categories = "SELECT * FROM categories";
                                $select_res = mysqli_query($connection, $select_categories);

                                if(!$select_res){
                                    echo "<h1>Please Insert Categories!</h1>";
                                }else{
                                    while($row_data = mysqli_fetch_assoc($select_res)){
                                        $id = $row_data["cat_id"];
                                        $title = $row_data["cat_title"];
                                        echo "<tr>
                                        <td>{$id}</td>
                                        <td>{$title}</td>
                                        <td><a href='categories.php?delete={$id}' style='color: red'>DELETE</a></td>
                                        <td><a href='categories.php?edit={$id}' style='color: green'>EDIT</a></td>
                                    </tr>";
                                    }
                                }
}

function delete_categories(){
    global $connection;

    if(isset($_GET['delete'])){
        $del_id = $_GET['delete'];

        $delete_sql = "DELETE FROM categories WHERE cat_id = {$del_id}";

        $delete_query = mysqli_query($connection, $delete_sql);
        header("Location: categories.php");
    }
}
                                
?>