<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description_task'];
        }
    }
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $title_updated = $_POST['title'];
        $description_updated = $_POST['description'];
        $query = "UPDATE task SET title = '$title_updated', description_task = '$description_updated' WHERE id = $id";
        mysqli_query($conn, $query);
        $_SESSION['message'] = 'Task Updated Successfully';
        $_SESSION['message_type'] = 'secondary';
        header("Location: index.php");
    }
?>

<?php include("include/header.php"); ?>
    <div class="container p-4">
        <div class="row">
                <div class="col-md-3">
                </div>
            <div class="col-md-6">
                <br>
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-toolbox mr-1"></i> Edit your item
                        </div>
                        <div class="card-body">

                        <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task description</label>
                                <input type="text" class="form-control" name="title" required id="" value="<?php echo $title; ?>">
                                <small id="emailHelp" class="form-text text-muted">This information will be stored again.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea name="description" class="form-control" required id="none" cols="30" rows="5"> <?php echo $description;?> </textarea>

                                <small id="emailHelp" class="form-text text-muted">This information will be stored again.</small>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="" id="" required>
                                <label class="form-check-label" for="exampleCheck1">Are my data correct?</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="update" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>

                        </div>
                        <div class="card-footer text-muted">
                            Nelson Almendares
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php include("include/footer.php"); ?>