<?php
include 'db.php';
?>
<div class="col-md-4">

    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form method="post" action="./search.php">
            <div class="input-group">
                <input type="text" name="input" class="form-control">
                <input type="submit" value="Search" name="search">
                <!-- <span class="input-group-btn"> -->
                <!-- <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button> -->
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <?php
                
                $select_cat = "select * from `categories`";
                $result = mysqli_query($connection, $select_cat);
                ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    
                    while($rows = mysqli_fetch_assoc($result)){
                        $category_title = $rows["cat_title"];
                        echo "<li>
                            <a href='#'>$category_title</a>
                            </li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include './includes/widget.php'; ?>

</div>