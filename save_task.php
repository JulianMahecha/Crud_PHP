<?php
include("db.php");


if (isset($_POST['save_task'])) {
    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')"; //Se almacena la consulta


        $result = mysqli_query($conn, $query); //Consulta, utilizando la variable de conexion del archivo db.php
    } else {
        $_SESSION['message'] = 'Debes darle un titulo a la tarea';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }


    if (!$result) {
        die("Query Fail");
    }

    $_SESSION['message'] = 'Task Saved Succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>