<!DOCTYPE html>
<html>
<head>
    <title>Correo de Prueba</title>
</head>
<body>
    <style>
        h1{
            color:#07ac7a;
        }
        .ayuda{
            background-color: #11cebe;
            padding: 2em;
            
        }
    </style>
    <h1>Gracias por registrarte en la Plataforma para el involucramiento del sector privado en la adaptación al cambio climático.</h1>
    <p>Estimado {{$details['empresa']}}</p>
    <p>Queremos darte la bienvenida al plan de adaptación al cambio climático</p>
    <p>A continuación, tu credenciales para ingresar a la plataforma:</p>
    <p>Usuario: {{$details['usuario']}}</p>
    <p>Contraseña: {{$details['clave']}}</p>
    <p>Para iniciar sessión, <a href="https://adapt-peru.vercel.app/">ingresa aquí</a> con las credenciales otorgadas.</p>
    <p>Muchas gracias.</p>
    <p>Equipo de Plataforma para el involucramiento del sector privado en la adaptación al cambio climático.</p>

    <p class="ayuda">¿Necesitas ayuda? <a href="https://adapt-peru.vercel.app/consultas">Contactanos</a></p>

</body>
</html>