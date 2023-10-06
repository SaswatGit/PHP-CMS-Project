<?php
        
        
        if(isset($_GET["delete"])){
            $delete_id = $_GET["delete"];
            $delete_sql = "DELETE FROM posts WHERE post_id ={$delete_id}";
            $delete_query = mysqli_query($connection, $delete_sql);

            if(!$delete_query){
                die("This post can not be deleted!" . mysqli_erro($delete_query));
            }
        }
        
        ?><table class="table table-boarded table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
                                
                                $post_sql = "SELECT * FROM posts";
                                $post_query = mysqli_query($connection, $post_sql);

                                if(!$post_query){
                                    die("Something went Wrong!" . mysqli_error($post_query));
                                }else{
                                    while($row_data = mysqli_fetch_assoc($post_query)){
                                        $id = $row_data["post_id"];
                                        $title = $row_data["post_title"];
                                        $cat_id = $row_data["post_category_id"];
                                        $author = $row_data["post_author"];
                                        $date = $row_data["post_date"];
                                        $image = $row_data["post_image"];
                                        $content = $row_data["post_content"];
                                        $tags = $row_data["post_tags"];
                                        $comment = $row_data["post_comment_count"];

                                        echo "<tr>
                                        <td>{$id}</td>
                                        <td>{$title}</td>
                                        <td>{$cat_id}</td>
                                        <td>{$author}</td>
                                        <td>{$date}</td>
                                        <td><img src = '../images/{$image}' width = '100' ></td>
                                        <td>{$content}</td>
                                        <td>{$tags}</td>
                                        <td>{$comment}</td>
                                        <td><a href='posts.php?source=edit_post&p_id={$id}'>Edit</a></td>
                                        <td><a href='posts.php?delete={$id}'>Delete</a></td>
                                    </tr>";
                                    }
                                }
                                
                                ?>


    </tbody>
</table>