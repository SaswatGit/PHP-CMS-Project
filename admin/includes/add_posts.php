<?php

if(isset($_POST["create_post"])){
    $post_title = $_POST["post_title"];
    $post_category = $_POST["post_category_id"];
    $post_author = $_POST["post_author"];
    $post_status = $_POST["post_status"];
    
    $post_image = $_FILES["post_image"]["name"];
    $post_image_tmp = $_FILES["post_image"]["tmp_name"];
    move_uploaded_file($post_image_tmp, "../images/$post_image");
    
    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];
    $post_date = date('d-m-y');
    $post_comment_count = 5;

    $post_sql= "INSERT INTO posts (post_title, post_category_id, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ('$post_title', '$post_category', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";

    $post_query = mysqli_query($connection, $post_sql);

    if(!$post_query){
        die("Something went Wrong!" . mysqli_error($post_query));
    }
}

?><form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category_Id</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Title</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Publish" class="btn btn-primary" name="create_post">
    </div>
</form>