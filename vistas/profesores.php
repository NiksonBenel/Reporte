<?php require "php/config.php";?>

<div class="row">
<div class="col-12">
<div class="card my-4">
<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
    <h6 class="text-white text-capitalize ps-3">Profesores</h6>
</div>
<div class="col-lg-3 col-sm-6 col-12">
    <a href="javascript:abrir()" class="btn bg-gradient-success w-50 mb-0 toast-btn">Agregar</a>
</div>
</div>
<div class="card-body px-0 pb-2">
<div class="table-responsive p-0">
<table class="table align-items-center mb-0">
<thead>
<tr>
<th class="text-center opacity-7">ID</th>
<th class="text-uppercase text-secondary ps-2">Nombre</th>
<th class="text-uppercase text-secondary ps-2 ">Rol</th>
<th class="text-uppercase text-secondary ps-2 ">Correo</th>
<th class="text-uppercase text-secondary ps-2">Usuario</th>
<th class="text-uppercase text-secondary ps-2">Clave</th>
<th colspan=2 class="text-secondary opacity-7"></th>
</tr>
</thead>
    <tbody>
        <?php 
        $query="SELECT * FROM usuarios";
            if ($result =$db->query($query)){
                while($row=$result->fetch_assoc()){
        ?>

        <tr>

            <td class="align-middle text-center text-sm"><?php echo $row['id_usu']?></td>
            <td >
                <div class="d-flex px-2 py-1">
                    <div>
                        <img src="<?php echo $row['url_img']?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row['nombre']?> <?php echo $row['apellido']?></h6>
                    </div>
                </div>
            </td>
            <td class="align-middle text-uppercase text-sm "><?php echo $row['rol']?></td>
            <td ><?php echo $row['correo']?></td>
            <td><?php echo $row['usuario']?></td>
            <td><?php echo $row['clave']?></td>
            <td class="align-middle text-uppercase text-sm">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Editar
                </a>
            </td>
            <td class="align-middle text-uppercase text-sm">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                Eliminar
                </a>
            </td>
        <tr>
        <?php 
                }
            }

        ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>


<div class="modal" id="ventana">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <a class="btn-close text-lg py-3 opacity-10" aria-hidden="true" href="javascript:cerrar()"></a>          
            </div>
            <div class="modal-body">
                <form action="" method="post" >
                <div class="form-group">
                        <label>Rol</label>
                        <input class="form-control" type="text" name="rol" placeholder="Rol" required>
                    </div>
                    <div class="form-group">
                        <label>Url_img</label>
                        <input class="form-control" type="text" name="url_img" placeholder="imagen" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input class="form-control" type="email" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input class="form-control" type="text" name="apellido" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <label>Usuario</label>
                        <input class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                        <label>Clave</label>
                        <input class="form-control" type="password" name="clave" placeholder="Clave" required>
                    </div>
                    <input class="btn bg-gradient-primary" type="submit" name="submit" value="Registrar">
                </form>
            </div>
        </div>
    </div>            
</div>
<?php
    if (isset($_POST['submit'])) {
        $myrol = limpiar_cadena($_POST['rol']);
        $myimg = limpiar_cadena($_POST['url_img']);
        $mycorreo = limpiar_cadena($_POST['correo']);
        $myname =limpiar_cadena($_POST['nombre']);
        $myapell = limpiar_cadena($_POST['apellido']);
        $myusername = limpiar_cadena($_POST['usuario']);
        $mypassword = limpiar_cadena($_POST['clave']);

        $sql = $db->prepare("INSERT INTO usuarios (rol, url_img, correo, nombre, apellido, usuario, clave) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('sssssss', $myrol, $myimg, $mycorreo, $myname, $myapell, $myusername, $mypassword);
        $sql->execute();

        if ($sql->error) {
            echo "Error en la consulta SQL: " . $sql->error;
        } else {
            if(headers_sent()){
                echo '<script>';
                echo 'alert("Registro de datos correcto");';
                echo 'window.location.href ="home.php?vista=profesores";';
                echo '</script>';
            }else {
                echo '<script type="text/javascript">';
                echo 'alert("Error en el registro de datos");';
                echo '</script>';
            }
        }
        $sql->close();
    }
?>





