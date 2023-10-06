<?php

if(isset($_GET["p_id"])){
    $the_post_id = $_GET["p_id"];
}

$post_sql = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
$post_query = mysqli_query($connection, $post_sql);

if(!$post_query){
    die("Something went Wrong!" . mysqli_error($post_query));
}else{
    while($row_data = mysqli_fetch_assoc($post_query)){
        $edit_id = $row_data["post_id"];
        $edit_title = $row_data["post_title"];
        $edit_cat_id = $row_data["post_category_id"];
        $edit_author = $row_data["post_author"];
        $edit_image = $row_data["post_image"];
        $edit_content = $row_data["post_content"];
        $edit_tags = $row_data["post_tags"];
        $edit_status = $row_data["post_status"];
        $edit_comment = $row_data["post_comment_count"];
    }
}

?>
<?php
            
            if(isset($_POST["update_post"])){
                $new_title = $_POST["post_title"];
                $new_cat_id = $_POST["post_category"];
                $new_author = $_POST["post_author"];
                $new_image = $_FILES["post_image"]["name"];
                $new_image_tmp = $_FILES["post_image"]["tmp_name"];
                move_uploaded_file($new_image_tmp, '../images/{$new_image}');
                $new_content = $_POST["post_content"];
                $new_tags = $_POST["post_tags"];
                $new_status = $_POST["post_status"];
                $new_comment = $_POST["post_comment_count"];

                $query = "UPDATE posts SET ";
                $query .= "post_title = '{$new_title}', "; 
                $query .= "post_category_id = '{$new_cat_id}', "; 
                $query .= "post_author = '{$new_author}', "; 
                $query .= "post_image = '{$new_image}', "; 
                $query .= "post_content = '{$new_content}', "; 
                $query .= "post_tags = '{$new_tags}', "; 
                $query .= "post_status = '{$new_status}', "; 
                $query .= "post_comment_count = '{$new_comment}' "; 
                $query .= "WHERE post_id = '{$the_post_id}'";

                $result = mysqli_query($connection, $query);

                if(empty($new_image)){
                    echo "Empty";
                }

                if(!$result){
                    die("Something went worong!" . mysqli_error($result));
                }
                
            }
            
            ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $edit_title; ?>" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category" id="">
            <option value="">---SELECT---</option>
            <?php
            
            $cat_sql = "SELECT * FROM categories";
            $cat_query= mysqli_query($connection, $cat_sql);
            if(!$cat_query){
                die("Something went wrong!" . mysqli_error($cat_query));
            }
            
                while($row_data = mysqli_fetch_assoc($cat_query)){
                    $cat_id = $row_data["cat_id"];
                    $cat_title = $row_data["cat_title"];

            echo "<option value='{$cat_id}'>{$cat_title}</option>";
            
            
        }
            
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $edit_author; ?>" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" value="<?php echo $edit_status; ?>" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img src="../images/<?php echo $edit_image; ?>" width="100" alt="">
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $edit_tags; ?>" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Comments</label>
        <input type="text" value="<?php echo $edit_comment; ?>" class="form-control" name="post_comment_count">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30"
            rows="10"><?php echo $edit_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" name="update_post">
    </div>
</form>