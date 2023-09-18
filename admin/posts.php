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

                        <?php 
                        
                        if(isset($_GET["source"])){
                            $source = $_GET["soruce"];
                        }else{
                            $source = "";
                        }

                        switch($source){
                            case 1:
                                echo "CASE 1";
                                break;
                            case 2:
                                echo "CASE 2";
                                break;
                            default:
                                include './includes/view_all_posts.php';
                                break;
                        }
                        
                        ?>





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