<?php
//index.php -MENU PRINCIPAL
//Mi agenda Verde-Dedicada a mi Papá G.A
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Mi Agenda Verde</title>
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"rel="stylesheet">
        <style>
            body {background: #fff7;
            font-family: Arial;
            text-align: center;}
            h1 { background: #4caf50;
            color: white;
            padding: 20px;}
            .cinta { background: pink;
            padding:10px;
            font-weight: bold;}
            .caja{ background: white;
            width: 80%;
            margin: 15px auto;
            padding: 15px;
            border-radius: 10px;}
            .tarjeta { background: white;
            display: inline-block;
            width: 180px;
            margin: 8px;
            padding; 10px;
            border-radius: 10px;}
            a {background: #ff5d8f;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius:10px;
            display: inline-block;
            margin: 5px;}
            img {whidth: 300px;
            border-radius:10px;}
            </style>
            </head>
            <body>


<h1> Mi Agenda verde- Diana</h1>
<div class ="cinta"> Web dedicada a mi papá G.A. por sus años de labor de reciclador"</div>


<div class="caja">
  <h2>Materiales Reciclables</h2>
  <div style="display: flex; 
  justify-content: center; 
  gap: 80px; 
  flex-wrap: wrap; 
  margin-top: 20px;">

    <div style="width: 110px; text-align: center;">
      <img src="img/plastico.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">

      <br><b>Plástico</b><br>Botellas y envases limpios
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/vidrio.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Vidrio</b><br>Frascos y botellas sin tapa
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/papel.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Papel y Cartón</b><br>Cajas, papel y cuadernos
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/metal.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Metal</b><br>Latas, fierros viejos, tapas metálicas
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/organico.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Orgánico</b><br>Restos de comida natural
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/electronicos.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Electrónicos</b><br>Computadores viejos, celulares, cables viejos
    </div>

    <div style="width: 110px; text-align: center;">
      <img src="img/ropa.jpg" 
      style="width: 80px; 
      height: 80px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 3px solid #2e7d32;">
      <br><b>Ropa</b><br>Textil en buen estado "Actividad conocida como ropa de segunda"
    </div>

  </div>
</div>

    <div class="caja">
        <h2> Mi Papá Reciclador </h2>
        
        <img src="img/papa.jpg" alt="Fotografía de mi papá reciclador" 
        style="width: 300px; 
        order-radius: 20px; 
        border: 5px solid #2e7d32; 
        margin: 15px;">

        <p> En busca de una fuente de trabajo y ante la carencia económica familiar, nació en la mente de mis padres 
            la actividad del reciclaje, transcurriendo ya 23 años de día tras día y dictar horas y horas de trabajo duro y 
            sacrificado. Queremos demostrar que no solo es bien económico, sino que va más allá de eso; es ayudar y 
            cuidar nuestro planeta porque. El hecho de recoger material que se lo puede volver a reutilizar reduce 
            la contaminación de suelos y ríos de nuestro planeta. </p>
        <br>
        <!--SOLO 2 BOTONES PUBLICOS - COREGIDO POR SEGURIDAD-->
<a class="btn-rosa" href="registro.php">1.Registrarse</a>
<a class="btn-rosa" href="login.php">2.Iniciar sesión</a>
<p class="mt-3"><small>Para ver tu dashboard y agregar contacto, primero inicia sesión.</small></p>
</div>
</div>
<p>Proyecto universitario - Mi agenda Verde</p>
</body>
</html>







            
