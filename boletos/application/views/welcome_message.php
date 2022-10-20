<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reservas</title>
    <link href="<?php echo base_url('recursos/css/estilos.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <h2 style="text-align: center;">Sistema de Reserva de boletos</h2>
        <section>
            <nav>
                <ul>
                    <li><button class="btn btn-outline-success" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Registrar Comprador</button></li>
                </ul>
            </nav>
            <article>
                <div class="card mb-3">
                    <?php
                    if ($salas != null) { 
                        foreach ($salas as $val) {
                    ?>
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?php echo base_url('recursos/imagenes/cinema.jpg'); ?>" class="img-fluid rounded-start" style="max-width: 100%; margin-top: 20px;">
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('id<?php echo $val['id']; ?>').style.display='block'">Realizar Reserva</button>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $val['nombre']; ?></h5>
                                    <p class="card-text">Total Cupos: <?= $val['cupos']; ?></p>
                                    <p class="card-text">Cupos Disponibles: <?= $val['cupos_disp']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div id="id<?php echo $val['id']?>" class="modal">
                        <form id="frm_reserva" method="POST">
                        <div class="modal-content animate">
                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id<?php echo $val['id']; ?>').style.display='none'" class="close" title="Close">&times;</span>
                                <br>
                            </div>
                            <div class="container">
                                <div class="card mb-3">                                  
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                        <img src="<?php echo base_url('recursos/imagenes/cinema.jpg'); ?>" class="img-fluid rounded-start" style="max-width: 100%; margin-top: 20px;">
                                            <p class="card-text"><small class="text-muted"><?php  ?></small></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <input type="hidden" value="<?php echo $val['id']?>" name="id_sala" >
                                                <h5 class="card-title"><?php echo $val['nombre']; ?></h5>
                                                <p class="card-text">Total Cupos Disponibles: <?= $val['cupos_disp']; ?></p>
                                                <label for="lst_comprador">Seleccione el comprador </label>
                                                <select name="lst_comprador" id="lst_comprador">
                                                    <?php
                                                    foreach ($compradores as $comp) { ?>
                                                    <option value="<?php echo $comp['id']; ?>"><?php echo $comp['nombres']." ".$comp['apellidos']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <br>
                                                <label for="username">Boletos a reservar</label>
                                                <input type="number" class="form-control" id="cantreserva" name="cantreserva" max="<?= $val['cupos_disp']; ?>" placeholder="Cantidad de Boletos" required>    
                                                <br>
                                                <button type="submit" id="btn_reserva" class="btn btn-outline-success">Reservar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php }
                } ?>
                </div>
            </article>
        </section>
    </header>
    <div id="id01" class="modal">
        <form class="modal-content animate" id="frm_registro" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="<?php echo base_url(); ?>recursos/imagenes/login.png" alt="Avatar" style="width: 200px; height: 200px;">
            </div>
            <div class="container">
			<label for="identificacion">Identificación</label>
                <input type="number" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación" required>

                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre EJ: (Juan)" required>

				<label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido EJ: (Benitez)" required>

                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="submit" class="btn btn-outline-success" value="Registrarse" id="btn_register">Registrarse</button>
            </div>
        </form>
    </div>

    <script src="<?php echo base_url(); ?>recursos/js/auth/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>recursos/js/auth/registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#btn_register").on("click", function(e) {
            e.preventDefault();
            var form = $("#frm_registro");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: "<?php echo base_url('index.php/comprador/crearComprador'); ?>",
                data: form.serialize(),
                success: function(resp) {
                    if (resp == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error, es posible que el comprador ya exista'
                        })
                    } else if (resp == 0) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Registro creado con exito!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        document.getElementById('id01').style.display = 'none';
                    }
                }
            })
        });
        $("#btn_reserva").on("click", function(e) {
            e.preventDefault();
            var form = $("#frm_reserva");
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: "<?php echo base_url('index.php/salas/crearReserva'); ?>",
                data: form.serialize(),
                success: function(resp) {
                    if (resp == 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Ha ocurrido un error'
                        })
                    } else if (resp == 0) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Reserva realizada con exito!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        document.getElementById('id01').style.display = 'none';
                    }
                }
            })
        });
    </script>
</body>

</html>