<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nuevo Mensaje de Contacto</title>
    <style>
        /* Estilos opcionales para el correo */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        .header {
            background-color: #f7f7f7;
            padding: 10px;
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nuevo Mensaje de Contacto</h2>
        </div>

        <div class="content">
            <p><strong>Nombre:</strong> {{ $name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $emailAddress }}</p>
            <p><strong>Teléfono:</strong> {{ $phone }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $messageContent }}</p>
        </div>

        <div class="footer">
            <p>Este correo electrónico fue enviado desde el formulario de contacto de tu sitio web.</p>
        </div>
    </div>
</body>
</html>
