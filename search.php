<?php 

include './includes/db.php';


?><DOCTYPE html>
    <html lang="en">
    <?php include './includes/header.php'; ?>

    <body>
        <!-- Navigation -->
        <?php include './includes/navigation.php'; ?>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Blog Entries Column -->
                <div class="col-md-8">
                    <?php
                    if(isset($_POST["search"])){
                        $search = $_POST["input"];
                
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                
                        $result = mysqli_query($connection, $query);
                        
                        if(!$result){
                            die("Some thing went wrong" . mysqli_error($connection));
                        }
                
                        $count = mysqli_num_rows($result);    
                
                        if($count == 0){
                            echo "<h1>No data found!</h1>";
                        }else{
                            while($row_data = mysqli_fetch_assoc($result)){
                                $post_title = $row_data["post_title"];
                                $post_autor = $row_data["post_author"];
                                $post_date = $row_data["post_date"];
                                $post_image = $row_data["post_image"];
                                $post_content = $row_data["post_content"];
            
            
                                
                    ?><h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title; ?>
                        </a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_autor; ?>
                        </a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    <a class="btn btn-primary" href="#">Read More <span
                            class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    <?php }  }
                    }?>




                    <!-- Pager -->
                    <?php include './includes/pager.php'; ?>
                </div>
                <!-- Blog Sidebar Widgets Column -->
                <?php include './includes/sidebar.php'; ?>
            </div>
            <!-- /.row -->
            <hr>
            <!-- Footer -->
            <?php include './includes/footer.php'; ?>
        </div>
        <!-- /.container -->
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>