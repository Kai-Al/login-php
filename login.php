<?php  
include('database.php');
if(!empty($_POST['user']) && !empty($_POST['password'])){
    $query = "SELECT * FROM login WHERE user = '".$_POST['user']."'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $user = $row['user'];
        $password = $row['password'];
        if(password_verify($_POST['password'], $password)){
            $_SESSION['message'] = "Inicio de sesión exitoso";
            $_SESSION['type'] = "success";
            header('Location: index.php');
        } else{
            $_SESSION['message'] = "Usuario o contraseña incorrectos";
            $_SESSION['type'] = "danger";
        }
    }else{
        $_SESSION['message'] = "Usuario o contraseña incorrectos";
        $_SESSION['type'] = "danger";
    }
}
?>

<?php  include('includes/header.php')?>
<div class="container p-4">
<div class="row">
    <div class="col-md-4 mx-auto">
    <h1>Iniciar sesión</h1>
    <?php include("includes/alert.php")?>
        <div class="card card-body">
         <form action="login.php" method = "POST">
                <div class="form-group">
                    <label class= "form-label" >Usuario</label>
                    <input type="text" name="user" class="form-control" autofocus>
                </div>
                <div class="form-group">
                    <label  class="form-label" >Contraseña</label>
                    <input type="password" name="password" class="form-control"></input>
                </div>
                <button class="btn btn-success btn-block" name = "login">
                    Iniciar sesión
                </button>
         </form>
        </div>
    </div>
</div>

</div>

<?php  include('includes/footer.php')?>