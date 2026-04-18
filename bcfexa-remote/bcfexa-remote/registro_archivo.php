<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCFEXA - Módulo de Intranet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a4b8c;
            --secondary-color: #2c6eb5;
            --accent-color: #4c9ae8;
            --light-color: #e9f2fb;
            --dark-color: #0d2b4e;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container-custom {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 0;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
        }
        
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        .form-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        
        .form-section-title {
            color: var(--primary-color);
            border-bottom: 2px solid var(--light-color);
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-danger-custom {
            background-color: #dc3545;
            border: none;
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-danger-custom:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .file-upload-area {
            border: 2px dashed #ccc;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background-color: #f8f9fa;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .file-upload-area:hover {
            border-color: var(--accent-color);
            background-color: var(--light-color);
        }
        
        .file-upload-area.dragover {
            border-color: var(--primary-color);
            background-color: #e3f2fd;
        }
        
        .file-upload-icon {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 15px;
        }
        
        .file-info {
            background-color: var(--light-color);
            border-radius: 6px;
            padding: 15px;
            margin-top: 15px;
            display: none;
        }
        
        .file-preview {
            max-width: 100%;
            max-height: 200px;
            margin-top: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
        }
        
        .required-field::after {
            content: " *";
            color: #dc3545;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .form-control-custom {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        
        .form-control-custom:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(76, 154, 232, 0.25);
        }
        
        .footer-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 20px 0;
            margin-top: 30px;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>
    <div class="container container-custom mt-4 mb-4">
        <div class="header-custom text-center">
            <h1><i class="fas fa-university me-2"></i>BCFEXA - Módulo de Intranet</h1>
            <p class="mb-0">Sistema de Gestión de Actividades Institucionales</p>
        </div>
        
        <div class="card-custom">
            <div class="card-header-custom">
                <h3 class="mb-0"><i class="fas fa-file-upload me-2"></i>Ubicación del Archivo</h3>
            </div>
            
            <div class="card-body">
                <form name="form1" id="form1" class="row g-3" action="procesar_archivo.php" method="POST" enctype="multipart/form-data">
                    <!-- Ubicación del Original -->
                    <div class="form-section">
                        <h4 class="form-section-title">Ubicación del Original</h4>
                        <div class="mb-3">
                            <label for="ubicacion_original" class="form-label required-field">Especifique la ubicación del archivo original</label>
                            <input type="text" class="form-control form-control-custom" id="ubicacion_original" name="ubicacion_original" placeholder="Ej: Archivo Central, Oficina de Gestión Documental, etc." required>
                        </div>
                    </div>
                    
                    <!-- Ubicación de la Copia -->
                    <div class="form-section">
                        <h4 class="form-section-title">Ubicación de la Copia</h4>
                        <div class="mb-3">
                            <label for="ubicacion_copia" class="form-label required-field">Especifique la ubicación de la copia</label>
                            <input type="text" class="form-control form-control-custom" id="ubicacion_copia" name="ubicacion_copia" placeholder="Ej: Departamento de Recursos Humanos, etc." required>
                        </div>
                    </div>
                    
                    <!-- Ubicación Digital - MODIFICADO PARA SUBIR ARCHIVOS PDF -->
                    <div class="form-section">
                        <h4 class="form-section-title">Ubicación Digital</h4>
                        <div class="mb-3">
                            <label class="form-label required-field">Suba el archivo digital (PDF)</label>
                            
                            <!-- Área de subida de archivos -->
                            <div class="file-upload-area" id="fileUploadArea">
                                <div class="file-upload-icon">
                                    <i class="fas fa-file-pdf"></i>
                                </div>
                                <h5>Arrastre y suelte su archivo PDF aquí</h5>
                                <p class="text-muted">o haga clic para seleccionar un archivo</p>
                                <input type="file" id="archivo_digital" name="archivo_digital" accept=".pdf" style="display: none;" required>
                                <button type="button" class="btn btn-primary-custom mt-2" id="selectFileBtn">
                                    <i class="fas fa-folder-open me-2"></i>Seleccionar Archivo
                                </button>
                            </div>
                            
                            <!-- Información del archivo seleccionado -->
                            <div class="file-info" id="fileInfo">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-file-pdf me-2 text-danger"></i>
                                        <span id="fileName">Nombre del archivo</span>
                                        <small class="text-muted d-block" id="fileSize">Tamaño del archivo</small>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-outline-danger" id="removeFileBtn">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Vista previa del PDF (solo enlace) -->
                            <div class="file-preview" id="filePreview">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Para ver el contenido del PDF, haga clic en el enlace de arriba después de cargarlo.
                                </div>
                            </div>
                            
                            <!-- Mensaje de validación -->
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>Solo se permiten archivos en formato PDF con un tamaño máximo de 10MB.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Botones de acción -->
                    <div class="form-section">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-danger-custom" onclick="window.history.back();">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-save me-2"></i>Guardar Archivo
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="footer-custom text-center">
            <p class="mb-0">
                <b class="copyright">
                    <a href="#" class="text-white text-decoration-none">IdeI</a> &copy; <?php echo date("Y"); ?> - Sistema BCFEXA
                </b>
            </p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('archivo_digital');
            const fileUploadArea = document.getElementById('fileUploadArea');
            const selectFileBtn = document.getElementById('selectFileBtn');
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const removeFileBtn = document.getElementById('removeFileBtn');
            const filePreview = document.getElementById('filePreview');
            
            // Abrir selector de archivos al hacer clic en el botón o en el área
            selectFileBtn.addEventListener('click', function() {
                fileInput.click();
            });
            
            fileUploadArea.addEventListener('click', function(e) {
                if (e.target !== selectFileBtn) {
                    fileInput.click();
                }
            });
            
            // Manejar la selección de archivos
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const file = this.files[0];
                    
                    // Validar tipo de archivo
                    if (file.type !== 'application/pdf') {
                        alert('Error: Solo se permiten archivos PDF.');
                        this.value = '';
                        return;
                    }
                    
                    // Validar tamaño del archivo (10MB máximo)
                    if (file.size > 10 * 1024 * 1024) {
                        alert('Error: El archivo es demasiado grande. El tamaño máximo permitido es 10MB.');
                        this.value = '';
                        return;
                    }
                    
                    // Mostrar información del archivo
                    fileName.textContent = file.name;
                    fileSize.textContent = formatFileSize(file.size);
                    fileInfo.style.display = 'block';
                    filePreview.style.display = 'block';
                    
                    // Cambiar estilo del área de subida
                    fileUploadArea.style.borderColor = '#28a745';
                    fileUploadArea.style.backgroundColor = '#f0fff4';
                }
            });
            
            // Eliminar archivo seleccionado
            removeFileBtn.addEventListener('click', function() {
                fileInput.value = '';
                fileInfo.style.display = 'none';
                filePreview.style.display = 'none';
                
                // Restaurar estilo del área de subida
                fileUploadArea.style.borderColor = '#ccc';
                fileUploadArea.style.backgroundColor = '#f8f9fa';
            });
            
            // Efectos de arrastrar y soltar
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                fileUploadArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                fileUploadArea.classList.add('dragover');
            }
            
            function unhighlight() {
                fileUploadArea.classList.remove('dragover');
            }
            
            fileUploadArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                
                if (files.length) {
                    fileInput.files = files;
                    fileInput.dispatchEvent(new Event('change'));
                }
            }
            
            // Función para formatear el tamaño del archivo
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
            
            // Validación del formulario antes de enviar
            document.getElementById('form1').addEventListener('submit', function(e) {
                if (!fileInput.files.length) {
                    e.preventDefault();
                    alert('Por favor, seleccione un archivo PDF para cargar.');
                    fileUploadArea.style.borderColor = '#dc3545';
                    return false;
                }
                
                const file = fileInput.files[0];
                if (file.type !== 'application/pdf') {
                    e.preventDefault();
                    alert('Error: Solo se permiten archivos PDF.');
                    return false;
                }
                
                if (file.size > 10 * 1024 * 1024) {
                    e.preventDefault();
                    alert('Error: El archivo es demasiado grande. El tamaño máximo permitido es 10MB.');
                    return false;
                }
                
                // Si todo está bien, mostrar mensaje de confirmación
                alert('El archivo se está subiendo. Por favor, espere...');
            });
        });
    </script>
</body>
</html>