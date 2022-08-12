<?php 
include("database.php");
if(!empty($_POST['user']) && !empty($_POST['password'])){
    $query = "SELECT * FROM login WHERE user = '".$_POST['user']."'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['message'] = "El usuario ya existe";
        $_SESSION['type'] = "danger";
    }else{
        $user = $_POST['user'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO login (user, password) VALUES ('$user', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['message'] = "Registro exitoso";
        $_SESSION['type'] = "success";
    }
}
?>
<?php include("includes/header.php")?>
<div class="container p-4">
<div class="col-md-4 mx-auto">
    <h1>Registro</h1>
    <?php include("includes/alert.php")?>
    <div class="card card-body">
        <form action="register.php" method="POST">
            <div class="form-group">
            <label class="form-label">Usuario</label>
                <input type="user" name="user" class="form-control" autofocus>
            </div>
            <div class="form-group">
            <label class="form-label">Contraseña</label>
                <input type="password" name="password" class = "form-control" id="password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="saveTask" value="Guardar">
                    Registrarse
                </button>
            </div>
        </form>
        </div>
    </div> 

</div>

<?php include("includes/footer.php")?>
