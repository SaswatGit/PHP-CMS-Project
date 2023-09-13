<?php include './includes/header.php'; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <div class="col-xs-6">
                            <?php
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
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category:</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="cat_insert" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
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
                                    </tr>";
                                    }
                                }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include './includes/footer.php'; ?>