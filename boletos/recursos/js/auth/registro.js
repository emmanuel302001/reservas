	$("#btn_login").on("click", function(e) {
		e.preventDefault();
		var form = $("#frm_login");
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: "<?php echo base_url('index.php/usuario/ingresarUsuario'); ?>",
			data: form.serialize(),
			success: function(resp) {
				if (resp == 1) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Usuario y/o contraseña incorrectos'
					})
				} else if (resp == 2) {
					Swal.fire({
						icon: 'error',
						text: 'Por favor ingrese usuario y contraseña'
					})
				}else if (resp == 3) {
					Swal.fire({
						icon: 'error',
						text: 'Por favor ingrese una contraseña'
					})
				}else if (resp == 4) {
					Swal.fire({
						icon: 'error',
						text: 'Por favor ingrese un correo electronico valido ejemplo@ejemplo.com'
					})
				}
				else if (resp === true) {
					window.location.href = "<?php echo base_url('index.php/principal'); ?>";
				}
			}
		})
	});
	$("#hregistro").on("click", function(e){
		document.getElementById('id01').style.display = 'none';
	});
	$("#btn_registrouser").on("click", function(e) {
		e.preventDefault();
		var form = $("#frm_rusuario");
		$.ajax({
			type: 'POST',
			dataType: 'JSON',
			url: "<?php echo base_url('index.php/usuario/crearUsuario'); ?>",
			data: form.serialize(),
			success: function(resp) {
				if (resp === false) {
					Swal.fire('El usuario ingresaro ya existe!')
				} else if (resp === true) {
					Swal.fire('Usuario creado con exito!');
					document.getElementById('id02').style.display = 'none';
					document.getElementById('id01').style.display = 'block';
				}
			}
		})
	});