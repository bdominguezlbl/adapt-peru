@extends('theme.publicbase')

@section('title')
    Implementación
@endsection


@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
       
        
        .btn-register {
            background-color: white;
            color: #2BB673;
            border: 1px solid #2BB673;
        }
        .section-title {
            color: #2BB673;
            font-size: 2rem;
            font-weight: bold;
        }
        .form-section {
            background-color: #2BB673;
            color: white;
            padding: 10px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control, .form-select {
            margin-top: 5px;
        }
        .upload-icon {
            font-size: 1.5rem;
            color: #2BB673;
        }
    </style>
</head>



    <div class="container mt-5">
        <h2 class="section-title">Etapa 2</h2>
        <h3 class="section-title">Adaptación</h3>
        <h4 class="section-title">FORMATO DE ACCIÓN DE ADAPTACIÓN</h4>

        <div class="form-section mt-4">1. Datos Generales</div>
        <form>
            <div class="form-group">
                <label for="nombreAccion">Nombre de la acción:</label>
                <input type="text" class="form-control" id="nombreAccion">
            </div>
            <div class="form-group">
                <label for="descripcionAccion">Breve descripción de la acción:</label>
                <textarea class="form-control" id="descripcionAccion" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="alcanceOrganizacional">Alcance organizacional:</label>
                <input type="text" class="form-control" id="alcanceOrganizacional">
                <label for="otroEspecificar">Otro (especifique):</label>
                <input type="text" class="form-control" id="otroEspecificar">
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación:</label>
                <input type="text" class="form-control" id="ubicacion">
            </div>

            <div class="form-section mt-4">2. Caracterización de la acción de adaptación</div>
            <div class="form-group">
                <label for="riesgoIdentificado">Riesgo identificado:</label>
                <select class="form-select" id="riesgoIdentificado">
                    <option>Seleccionar</option>
                </select>
                <label for="otroRiesgo">Otro (especifique):</label>
                <input type="text" class="form-control" id="otroRiesgo">
            </div>
            <div class="form-group">
                <label>Criterios de adaptación:</label><br>
                <input type="checkbox" id="reduccionExposicion">
                <label for="reduccionExposicion">Reducción de exposición</label>
                <input type="checkbox" id="reduccionSensibilidad">
                <label for="reduccionSensibilidad">Reducción nivel de sensibilidad</label>
                <input type="checkbox" id="incrementoCapacidad">
                <label for="incrementoCapacidad">Incremento de la capacidad adaptativa</label>
            </div>
            <div class="form-group">
                <label>Sujeto de vulnerabilidad:</label><br>
                <input type="checkbox" id="productoServicio">
                <label for="productoServicio">Producto/Servicio</label>
                <input type="checkbox" id="recursosNaturales">
                <label for="recursosNaturales">Recursos naturales y ecosistemas</label>
                <input type="checkbox" id="sistemaProductivo">
                <label for="sistemaProductivo">Sistema productivo</label>
                <input type="checkbox" id="personasComunidad">
                <label for="personasComunidad">Personas y comunidad</label>
            </div>

            <div class="form-section mt-4">3. Planificación y gobernanza</div>
            <div class="form-group">
                <label for="departamentoResponsable">Departamento responsable:</label>
                <input type="text" class="form-control" id="departamentoResponsable">
            </div>
            <div class="form-group">
                <label for="numeroEmpleados">Número de empleados involucrados:</label>
                <input type="text" class="form-control" id="numeroEmpleados">
            </div>
            <div class="form-group">
                <label for="fechaInicio">Fecha de Inicio:</label>
                <input type="date" class="form-control" id="fechaInicio">
            </div>
            <div class="form-group">
                <label for="duracion">Duración:</label>
                <select class="form-select" id="duracion">
                    <option>Select</option>
                </select>
                <label for="duracionAnios">años</label>
                <input type="text" class="form-control" id="duracionAnios">
                <label for="cronograma">Cronograma de implementación:</label>
                <input type="file" class="form-control" id="cronograma">
            </div>
            <div class="form-group">
                <label for="presupuesto">Presupuesto:</label>
                <select class="form-select" id="presupuesto">
                    <option>Moneda</option>
                </select>
                <input type="text" class="form-control" id="presupuestoMonto">
            </div>

            <div class="form-section mt-4">4. Monitoreo y reporte</div>
            <div class="form-group">
                <label for="metricasCuantitativas">Métricas cuantitativas:</label>
                <input type="text" class="form-control" id="metricasCuantitativas">
            </div>
            <div class="form-group">
                <label for="numeroBeneficiarios">Números de beneficiarios:</label>
                <input type="text" class="form-control" id="numeroBeneficiarios">
            </div>
            <div class="form-group">
                <label for="otrosEspecificos">Otros específicos asociados a la acción:</label>
                <input type="text" class="form-control" id="otrosEspecificos">
            </div>
            <div class="form-group">
                <label for="metricasCualitativas">Métricas cualitativas (opcional):</label>
                <input type="text" class="form-control" id="metricasCualitativas">
            </div>
            <div class="form-group">
                <label for="atributos">Atributos* (nivel de intencionalidad, RTR):</label>
                <input type="text" class="form-control" id="atributos">
            </div>

            <div class="form-section mt-4">5. Otros documentos</div>
            <div class="form-group">
                <label for="adjuntarPDF">Adjuntar en PDF:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nota conceptual/business-case">
                    <span class="input-group-text"><i class="fas fa-upload upload-icon"></i></span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Estudios técnicos">
                    <span class="input-group-text"><i class="fas fa-upload upload-icon"></i></span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Evidencia multimedia (fotos, videos, etc.)">
                    <span class="input-group-text"><i class="fas fa-upload upload-icon"></i></span>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Otro (especifique)">
                    <span class="input-group-text"><i class="fas fa-upload upload-icon"></i></span>
                </div>
                <div class="input-group mb-3 ">
                    <button class="btn btn-continue2" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5d5L5hb5g7v4l5Y5b5Y5b5Y5b5" crossorigin="anonymous"></script>


@endsection