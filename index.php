<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
   
          <div class="form-group">
            <input type="text" name="tramite" class="form-control" placeholder="ingrese el tramite que solicita" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="oficina" class="form-control" placeholder="ingrese la oficina que le queda cerca" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="numero_cuenta" class="form-control" placeholder="ingrese su numero de cuenta" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="ingrese su nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Apellido" class="form-control" placeholder="ingrese su Apellido" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="telefono" class="form-control" placeholder="ingrese su numero de telefono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="correo" class="form-control" placeholder="ingrese su correo" autofocus>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>tramite</th>
            <th>oficina</th>
            <th>numero_cuenta</th>
            <th>nombre</th>
            <th>Apellido</th>
            <th>telefono</th>
            <th>correo</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['tramite']; ?></td>
            <td><?php echo $row['oficina']; ?></td>
            <td><?php echo $row['numero_cuenta']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['Apellido']; ?></td>
            <td><?php echo $row['telefono']; ?></td> 
            <td><?php echo $row['correo']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
