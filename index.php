//Gabriel Sanchez Reynoso - Matricula: 2024-0269 


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultorio Dental - Registro de Visitas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .header h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .btn-success {
            background-color: #27ae60;
        }
        
        .btn-success:hover {
            background-color: #229954;
        }
        
        .visitas-container {
            margin-top: 20px;
        }
        
        .visita-card {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
        }
        
        .visita-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .paciente-nombre {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }
        
        .fecha-visita {
            color: #7f8c8d;
            font-size: 14px;
        }
        
        .visita-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .info-item {
            display: flex;
            flex-direction: column;
        }
        
        .info-label {
            font-weight: bold;
            color: #34495e;
            font-size: 12px;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        
        .info-value {
            color: #2c3e50;
            font-size: 14px;
        }
        
        .no-visitas {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
        }
        
        .total-visitas {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🦷 Consultorio Dental</h1>
            <p>Sistema de Registro de Visitas</p>
        </div>
        
        <a href="registrar_visita.php" class="btn btn-success">➕ Registrar Nueva Visita</a>
        
        <?php
        // Leer datos de visitas
        $archivo_visitas = 'datos/visitas.json';
        $visitas = [];
        
        if (file_exists($archivo_visitas)) {
            $contenido = file_get_contents($archivo_visitas);
            $visitas = json_decode($contenido, true) ?? [];
        }
        
        // Ordenar visitas por fecha 
        usort($visitas, function($a, $b) {
            return strtotime($b['fecha_hora']) - strtotime($a['fecha_hora']);
        });
        ?>
        
        <div class="total-visitas">
            <strong>Total de visitas registradas: <?php echo count($visitas); ?></strong>
        </div>
        
        <div class="visitas-container">
            <?php if (empty($visitas)): ?>
                <div class="no-visitas">
                    <h3>No hay visitas registradas</h3>
                    <p>Haga clic en "Registrar Nueva Visita" para comenzar</p>
                </div>
            <?php else: ?>
                <?php foreach ($visitas as $visita): ?>
                    <div class="visita-card">
                        <div class="visita-header">
                            <div class="paciente-nombre">
                                <?php echo htmlspecialchars($visita['nombre'] . ' ' . $visita['apellido']); ?>
                            </div>
                            <div class="fecha-visita">
                                <?php echo date('d/m/Y H:i', strtotime($visita['fecha_hora'])); ?>
                            </div>
                        </div>
                        
                        <div class="visita-info">
                            <div class="info-item">
                                <span class="info-label">Cédula</span>
                                <span class="info-value"><?php echo htmlspecialchars($visita['cedula']); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Edad</span>
                                <span class="info-value"><?php echo htmlspecialchars($visita['edad']); ?> años</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Motivo de la visita</span>
                                <span class="info-value"><?php echo htmlspecialchars($visita['motivo']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>