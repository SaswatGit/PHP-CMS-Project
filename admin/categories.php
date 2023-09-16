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

                            <?php insert_categories(); ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Category:</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="cat_insert" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>



                            <?php if(isset($_GET["edit"])){
                                $update_id = $_GET["edit"];

                                include './includes/update_cat.php';
                            } ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php findAllCategories(); ?>

                                    <?php delete_categories(); ?>

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