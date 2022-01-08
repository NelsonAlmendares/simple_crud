<?php
    include("db.php")
?>
    <?php include("include/header.php")?>

        <div class="container-fluid p-4">
            <div class="row">
                <!-- Parte lateral izquierda (más pequeña) -->
                <div class="col-md-3 mt-2">

                <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php session_unset(); } ?>

                    <div class="card">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <div class="container">
                                <h5 class="card-title text-center mb-4">Main form</h5>
                            </div>
                            <form action="save-task.php" method="POST">  
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Task title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Type your task" autofocus required >
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Description</label>
                                    <textarea name="description" id="" rows="5" class="form-control" placeholder="Task description" required ></textarea>
                                </div>
                                <input type="submit" class="btn btn-outline-success btn-block" name="save_task" value="Save task">
                            </form>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </div>
                <!-- Parte lateral derecha (más grande) -->
                <div class="col-md-9">
                    <?php ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Title</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-center">Created At</th>
                            <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM task";
                                $result_task = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result_task)){ ?>
                                    <tr>
                                        <th class="text-center" scope="row"> <?php echo $row['id']?> </th>
                                        <td class="text-center"><?php echo $row['title'] ?></td>
                                        <td class="text-center"><?php echo $row['description_task'] ?></td>
                                        <td class="text-center"><?php echo $row['created_at'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="Edit data">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delet item">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 
    <?php include("include/footer.php")?>
  </body>
</html>