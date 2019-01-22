<?php include("db.php") //Se requiere la conexion a la base de datos.?>
<?php include("includes/header.php") ?> 
    
    <div class="container p-4">
        <div class="row">
            <!--Columna del formulario principal -->
                <div class="col-md-4">
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session_unset();
                } ?>          


                    <div class="card card-body">
                        <form action="save_task.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="2" class="form-control" placeholder ="Task Description"></textarea>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="save_task" value= "Save">
                        </form>
                    </div>
                </div>

            <!--Columna que muestra las tareas almacenadas-->
                <div class="col md-8">
                   <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>

                    <tbody>
                        <?php
                            $query = "SELECT * FROM task";
                            $result_tasks= mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)){ ?>

                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a href="edit_task.php?id=<?php echo $row['id']?>">Edit</a>
                                    <a href="delete_task.php?id=<?php echo $row['id']?>">Delete</a>
                                </td>
                            </tr>
                            
                                
                                   
                        <?php } ?>
                    </tbody>

                   </table>
                </div>
        </div>
    </div>



<?php include("includes/footer.php") ?>
    
    
    