<?php
// Crear directorio de datos si no existe
if (!file_exists('datos')) {
    mkdir('datos', 0777, true);
}

// Verificar que se enviaron los datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y limpiar los datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $cedula = trim($_POST['cedula'] ?? '');
    $edad = intval($_POST['edad'] ?? 0);
    $motivo = trim($_POST['motivo'] ?? '');
    
    // Validar que todos los campos estén completos
    if (empty($nombre) || empty($apellido) || empty($cedula) || $edad <= 0 || empty($motivo)) {
        echo "<script>alert('Por favor complete todos los campos'); window.history.back();</script>";
        exit;
    }
    
    // Crear nueva visita
    $nueva_visita = [
        'id' => uniqid(),
        'nombre' => $nombre,
        'apellido' => $apellido,
        'cedula' => $cedula,
        'edad' => $edad,
        'motivo' => $motivo,
        'fecha_hora' => date('Y-m-d H:i:s')
    ];
    
    // Leer visitas existentes
    $archivo_visitas = 'datos/visitas.json';
    $visitas = [];
    
    if (file_exists($archivo_visitas)) {
        $contenido = file_get_contents($archivo_visitas);
        $visitas = json_decode($contenido, true) ?? [];
    }
    
    // Agregar nueva visita
    $visitas[] = $nueva_visita;
    
    // Guardar en archivo JSON
    $json_data = json_encode($visitas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    if (file_put_contents($archivo_visitas, $json_data)) {
        // Redirigir con mensaje de éxito
        header('Location: index.php?mensaje=exito');
        exit;
    } else {
        echo "<script>alert('Error al guardar la visita'); window.history.back();</script>";
        exit;
    }
} else {
    // Si no se accede por POST, redirigir al formulario
    header('Location: registrar_visita.php');
    exit;
}
?>