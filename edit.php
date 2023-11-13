<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $tramite = $row['tramite'];
    $oficina = $row['oficina'];
    $numero_cuenta = $row['numero_cuenta'];
    $nombre = $row['nombre'];
    $Apellido= $row['Apellido'];
    $telefono = $row['telefono'];
    $correo = $row['correo'];
    
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $tramite= $_POST['tramite'];
  $oficina = $_POST['oficina'];
  $numero_cuenta= $_POST['numero_cuenta'];
  $nombre = $_POST['nombre'];
  $Apellido= $_POST['Apellido'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];


  $query = "UPDATE task SET tramite = '$tramite', oficina = '$oficina', numero_cuenta = '$numero_cuenta', nombre = '$nombre', Apellido = '$Apellido', telefono = '$telefono', correo = '$correo' WHERE id='$id'";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="tramite" type="text" class="form-control" value="<?php echo $tramite; ?>" placeholder="tramite">
        </div>
        <div class="form-group">
          <input name="oficina" type="text" class="form-control" value="<?php echo $oficina; ?>" placeholder="oficina">
        </div>
        <div class="form-group">
          <input name="numero_cuenta" type="text" class="form-control" value="<?php echo $numero_cuenta; ?>" placeholder="numero_cuenta">
        </div>
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="nombre">
        </div>
        <div class="form-group">
          <input name="Apellido" type="text" class="form-control" value="<?php echo $Apellido; ?>" placeholder="Apellido">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="telefono">
        </div>
        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="correo">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
