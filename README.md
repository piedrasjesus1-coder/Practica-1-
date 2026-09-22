<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Profesor</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #050811;
            --card-bg: rgba(13, 21, 38, 0.75);
            --card-border: rgba(0, 242, 254, 0.2);
            --neon-cyan: #00f2fe;
            --neon-blue: #4facfe;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --input-bg: rgba(6, 11, 25, 0.8);
            --input-border: #1e293b;
            --glow-color: rgba(0, 242, 254, 0.35);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Space Grotesk', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            /* Fondo cibernético con rejilla y luces neón */
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(0, 242, 254, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 85% 85%, rgba(79, 70, 229, 0.15) 0%, transparent 45%),
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 30px 30px, 30px 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 15px;
            color: var(--text-primary);
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--card-border);
            border-radius: 24px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.8), 0 0 20px var(--glow-color);
            width: 100%;
            max-width: 680px;
            overflow: hidden;
            position: relative;
        }

        /* Línea neón superior decorativa */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--neon-cyan), var(--neon-blue));
            box-shadow: 0 0 10px var(--neon-cyan);
        }

        .card-header {
            padding: 32px 30px 20px;
            text-align: center;
        }

        .card-header h2 {
            color: var(--text-primary);
            font-size: 26px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            letter-spacing: -0.02em;
            text-transform: uppercase;
        }

        .card-header p {
            color: var(--text-secondary);
            font-size: 14px;
            margin-top: 6px;
        }

        form {
            padding: 20px 32px 32px;
        }

        /* Alerta de éxito estilo HUD */
        .alert-success {
            display: none;
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.4);
            box-shadow: 0 0 15px rgba(16, 185, 129, 0.2);
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 600;
            align-items: center;
            gap: 12px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 18px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 8px;
            color: var(--neon-cyan);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        label span.req {
            color: #ff4757;
        }

        /* Contenedor de Input con ícono */
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper svg.field-icon {
            position: absolute;
            left: 14px;
            color: var(--text-secondary);
            transition: color 0.3s ease;
            pointer-events: none;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 14px 12px 42px; /* Espacio para el ícono a la izquierda */
            border: 1px solid var(--input-border);
            border-radius: 12px;
            font-size: 14px;
            color: var(--text-primary);
            background-color: var(--input-bg);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%200f2fe' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
        }

        select option {
            background-color: #0b1329;
            color: var(--text-primary);
        }

        textarea {
            resize: vertical;
            min-height: 85px;
            padding-top: 12px;
        }

        /* Efectos Focus con Neón */
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--neon-cyan);
            background-color: rgba(10, 20, 40, 0.9);
            box-shadow: 0 0 15px var(--glow-color);
        }

        .input-wrapper:focus-within svg.field-icon {
            color: var(--neon-cyan);
        }

        .uppercase {
            text-transform: uppercase;
        }

        /* Botón estilo Cyberpunk Glow */
        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--neon-cyan), var(--neon-blue));
            color: #030712;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 0 20px var(--glow-color);
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px rgba(0, 242, 254, 0.6);
            filter: brightness(1.1);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Responsividad */
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            <h2>
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="var(--neon-cyan)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Modificar Profesor
            </h2>
            <p>Edita las credenciales e información general del docente</p>
        </div>

        <form id="formProfesor">
            
            <!-- Mensaje de Éxito -->
            <div id="mensajeExito" class="alert-success">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>¡SISTEMA: Datos del profesor actualizados con éxito!</span>
            </div>

            <!-- Nombre Completo -->
            <div class="form-group">
                <label for="nombre">Nombre Completo <span class="req">*</span></label>
                <div class="input-wrapper">
                    <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan Carlos Pérez Gómez" required>
                </div>
            </div>

            <!-- Número de Control y CURP -->
            <div class="form-row">
                <div class="form-group">
                    <label for="numero_control">N° de Control <span class="req">*</span></label>
                    <div class="input-wrapper">
                        <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="16" rx="2"></rect><line x1="7" y1="8" x2="17" y2="8"></line><line x1="7" y1="12" x2="13" y2="12"></line></svg>
                        <input type="text" id="numero_control" name="numero_control" placeholder="PROF-202601" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="curp">CURP <span class="req">*</span></label>
                    <div class="input-wrapper">
                        <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line></svg>
                        <input type="text" id="curp" name="curp" class="uppercase" placeholder="ABCD123456HDFXXX01" maxlength="18" minlength="18" required>
                    </div>
                </div>
            </div>

            <!-- Correo Electrónico y Teléfono -->
            <div class="form-row">
                <div class="form-group">
                    <label for="correo">Correo Electrónico <span class="req">*</span></label>
                    <div class="input-wrapper">
                        <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <input type="email" id="correo" name="correo" placeholder="profesor@ejemplo.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono <span class="req">*</span></label>
                    <div class="input-wrapper">
                        <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <input type="tel" id="telefono" name="telefono" placeholder="5512345678" required>
                    </div>
                </div>
            </div>

            <!-- Género -->
            <div class="form-group">
                <label for="genero">Género <span class="req">*</span></label>
                <div class="input-wrapper">
                    <svg class="field-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v8"></path><path d="M8 12h8"></path></svg>
                    <select id="genero" name="genero" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="no_binario">No binario</option>
                        <option value="prefiero_no_decir">Prefiero no decir</option>
                    </select>
                </div>
            </div>

            <!-- Dirección -->
            <div class="form-group">
                <label for="direccion">Dirección <span class="req">*</span></label>
                <div class="input-wrapper">
                    <svg class="field-icon" style="top: 14px;" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <textarea id="direccion" name="direccion" placeholder="Calle, número, colonia, C.P. y ciudad" required></textarea>
                </div>
            </div>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn-submit">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Guardar Cambios
            </button>

        </form>
    </div>

    <!-- JavaScript -->
    <script>
        const form = document.getElementById('formProfesor');
        const mensajeExito = document.getElementById('mensajeExito');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            mensajeExito.style.display = 'flex';
            mensajeExito.scrollIntoView({ behavior: 'smooth', block: 'center' });

            setTimeout(() => {
                mensajeExito.style.display = 'none';
            }, 4000);
        });
    </script>

</body>
</html>  
</body>
</html>
