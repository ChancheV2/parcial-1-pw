#Gabriel Sanchez Reynoso - Matricula: 2024-0269 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Visita - Consultorio Dental</title>
    
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
            max-width: 600px;
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #3498db;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .btn {
            background-color: #27ae60;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        
        .btn:hover {
            background-color: #229954;
        }
        
        .btn-secondary {
            background-color: #95a5a6;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-top: 10px;
        }
        
        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
        
        .fecha-info {
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            color: #2c3e50;
        }
        
        .required {
            color: #e74c3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📝 Registrar Nueva Visita</h1>
            <p>Complete todos los campos para registrar la visita</p>
        </div>
        
        <div class="fecha-info">
            <strong>Fecha y hora actual:</strong> <?php echo date('d/m/Y H:i:s'); ?>
            <br><small>Se registrará automáticamente al guardar</small>
        </div>
        
        <form action="procesar_visita.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre <span class="required">*</span></label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido <span class="required">*</span></label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="cedula">Cédula <span class="required">*</span></label>
                    <input type="text" id="cedula" name="cedula" required>
                </div>
                <div class="form-group">
                    <label for="edad">Edad <span class="required">*</span></label>
                    <input type="number" id="edad" name="edad" min="1" max="120" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="motivo">Motivo de la visita <span class="required">*</span></label>
                <select id="motivo" name="motivo" required>
                    <option value="">Seleccione el motivo...</option>
                    <option value="Limpieza dental">Limpieza dental</option>
                    <option value="Tratamiento de caries">Tratamiento de caries</option>
                    <option value="Dolor dental">Dolor dental</option>
                    <option value="Chequeo general">Chequeo general</option>
                    <option value="Ortodoncia">Ortodoncia</option>
                    <option value="Extracción">Extracción</option>
                    <option value="Emergencia">Emergencia</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            
            <button type="submit" class="btn">💾 Guardar Visita</button>
            <a href="index.php" class="btn btn-secondary">🔙 Volver al Inicio</a>
        </form>
    </div>
</body>
</html>
    