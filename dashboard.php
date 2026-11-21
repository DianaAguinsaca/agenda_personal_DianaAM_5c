<?php
include("conexion.php");
include("funciones.php");
include("sesiones.php");
verificarSesion();

$conn = conectarDB();
$id_usuario = $_SESSION['id_usuario'];

$busqueda = isset($_GET['busqueda']) ? trim($_GET['busqueda']) : '';
$busqueda_like = "%" . $busqueda . "%";
$orden_permitido = ['nombre' => 'nombre ASC','ciudad' => 'ciudad ASC','fecha' => 'id DESC'];
$orden_clave = isset($_GET['orden']) && isset($orden_permitido[$_GET['orden']]) ? $_GET['orden'] : 'fecha';
$orden_sql = $orden_permitido[$orden_clave];

$sql = "SELECT * FROM contactos WHERE id_usuario = ? AND (nombre LIKE ? OR correo LIKE ? OR ciudad LIKE ?) ORDER BY $orden_sql";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $id_usuario, $busqueda_like, $busqueda_like, $busqueda_like);

$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success bg-opacity-10">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
                <p>Correo: <?php echo htmlspecialchars($_SESSION['correo']); ?></p>

                <div class="d-flex justify-content-between mb-3">
                    <a href="agregar.php" class="btn btn-success">Agregar contacto</a>
                    <a href="cerrar.php" class="btn btn-danger">Cerrar sesión</a>
                </div>

                <form method="GET" class="row g-2 mb-3">
                <div class="col-md-6"><input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre, correo o ciudad..." value="<?php echo htmlspecialchars($busqueda); ?>"></div>
                <div class="col-md-3"><select name="orden" class="form-select"><option value="fecha">Más recientes</option><option value="nombre">Por nombre</option><option value="ciudad">Por ciudad</option></select></div>
                <div class="col-md-3"><button class="btn btn-success w-100">Buscar / Ordenar</button></div>
                
                </form>
                
                <table class="table table-bordered table-striped">

                    <tr class="table-success">
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Ciudad</th>
                        <th>Acciones</th>
                    </tr>

                    <?php while($fila = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($fila['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                        <td><?php echo htmlspecialchars($fila['ciudad']); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $fila['id']; ?>" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que quieres eliminar este contacto?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>

                <?php if($result->num_rows == 0){ ?>
                    <p class="text-center text-muted">Aún no tienes contactos. ¡Agrega el primero! 🌿</p>
                <?php } ?>

            </div>
        </div>
    </div>
</body>
</html>