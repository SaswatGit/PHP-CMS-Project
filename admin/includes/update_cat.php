<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category:</label>

        <?php
                                    
                                    if(isset($_GET['edit'])){
                                            $edit_id = $_GET['edit'];

                                            $display_sql = "SELECT * FROM categories WHERE cat_id = {$edit_id}";

                                            $display_query = mysqli_query($connection, $display_sql);

                                            while($row = mysqli_fetch_assoc($display_query)){
                                                $edit_id = $row["cat_id"];
                                                $edit_title = $row["cat_title"];
                                            }
                                            
                                            ?>
        <input type="text" name="edit_title" value="<?php echo $edit_title; ?>" class="form-control">
        <?php } ?>

        <?php if(isset($_POST["update"])){
                                        $update_title = $_POST["edit_title"];

                                        $update_sql = "UPDATE categories SET cat_title = '{$update_title}' WHERE cat_id = '{$update_id}'";

                                        $update_query = mysqli_query($connection, $update_sql);

                                    } ?>

    </div>
    <div class="form-group">
        <input type="submit" value="Update" name="update" class="btn btn-primary">
    </div>
</form>