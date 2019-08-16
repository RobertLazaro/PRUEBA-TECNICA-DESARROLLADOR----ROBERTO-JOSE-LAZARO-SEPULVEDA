<?php include("db.php") ?>

<?php include("includes/header.php") ?>
    
    <div class="container p-4">

        <div class="row">
        
            <div class="col-md-4">

                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Ingresa una tarea." autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="4" class="form-control" placeholder="Descripción de la tarea."></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar Tarea">
                    </form>
                </div> <BR>

                <?php if(isset($_SESSION['message'])){ ?>
                        <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php session_unset(); } ?>

            </div>

            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Fecha de Creación</th>
                                <th>Finalizar Tarea</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM task";
                                $result_tasks = mysqli_query($connect, $query);

                                while($row = mysqli_fetch_array($result_tasks)) { ?>
                                    <tr>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><?php echo $row['date_created'] ?></td>
                                        <td>
                                            <div id="finalizar" align="center">
                                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                                    <i class="far fa-check-square"></i>
                                                </a>
                                            </div>                                        
                                        </td>
                                        <td>
                                            <div align="center">
                                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
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

<?php include("includes/footer.php") ?>    