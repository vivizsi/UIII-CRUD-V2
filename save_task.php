<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $tramite = $_POST['tramite'];
  $oficina = $_POST['oficina'];
  $numero_cuenta = $_POST['numero_cuenta'];
  $nombre = $_POST['nombre'];
  $Apellido = $_POST['Apellido'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $query = "INSERT INTO task(tramite, oficina,numero_cuenta,nombre,Apellido,telefono,correo) VALUES ('$tramite', '$oficina','$numero_cuenta','$nombre','$Apellido','$telefono','$correo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
