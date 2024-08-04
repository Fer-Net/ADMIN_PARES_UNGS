@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container"> 
        <div id="alert_param_lic" class="alert alert-danger alert-dismissible fade show" style="display:none">
            <button class="btn close" onClick="hideAlert()">&times;</button>
        </div>
        <h1>Crear Proveedor</h1>

        <form id="provider-form">
            @csrf
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo" required>
                        <option value="">Seleccionar</option> <!-- Opción por defecto -->
                        <option value="Entidades mutuales y cooperativas registradas en el INAES">Entidades mutuales y cooperativas registradas en el INAES</option>
                        <option value="Emprendimientos asociativos con matrícula en trámite (precooperativas)">Emprendimientos asociativos con matrícula en trámite (precooperativas)</option>
                        <option value="Emprendimientos asociativos productivos o de servicios de la Economía Popular">Emprendimientos asociativos productivos o de servicios de la Economía Popular</option>
                        <option value="Microempresas locales / emprendimientos familiares">Microempresas locales / emprendimientos familiares</option>
                    </select>
                </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-12 col-md-6">
            <label for="distrito">Distrito</label>
            <select class="form-control" id="distrito" name="distrito" required>
                <option value="">Seleccionar</option> <!-- Opción por defecto -->
                <option value="Malvinas Argentinas">Malvinas Argentinas</option>
                <option value="San Miguel">San Miguel</option>
                <option value="José C. Paz">José C. Paz</option>
                <option value="Pilar">Pilar</option>
                <option value="Hurlingham">Hurlingham</option>
                <option value="Escobar">Escobar</option>
                <option value="Ituzaingó">Ituzaingó</option>
                <option value="Morón">Morón</option>
                <option value="Tigre">Tigre</option>
                <option value="Lujan">Lujan</option>
                <option value="Gral Rodriguez">Gral Rodriguez</option>
                <option value="San Martin">San Martin</option>
                <option value="Moreno">Moreno</option>
                <option value="Tres de Febrero">Tres de Febrero</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        <div class="form-group col-12 col-md-6" id="otro-distrito-container" style="display:none;">
            <label for="otro-distrito">Especificar otro distrito</label>
            <input type="text" class="form-control" id="otro-distrito" name="otro-distrito">
        </div>

        <!-- Incluir jQuery desde el CDN -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#distrito').on('change', function() {
                    if ($(this).val() === 'Otro') { // "Otro" se corresponde con el valor '15'
                        $('#otro-distrito-container').show();
                    } else {
                        $('#otro-distrito-container').hide();
                        $('#otro-distrito').val(''); // Limpiar el campo de texto si se oculta
                    }
                });
            });
        </script>

                <div class="form-group col-12 col-md-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="existen_registros_compras_ungs">¿Existen registros de compras UNGS?</label>
                    <input type="checkbox" id="existen_registros_compras_ungs" name="existen_registros_compras_ungs">
                </div>
                <div class="form-group col-12">
                    <label for="correo_electronico">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico">
                </div>
                <div class="form-group col-12">
                    <label for="pagina_web">Página Web</label>
                    <input type="url" class="form-control" id="pagina_web" name="pagina_web">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="nombre_referente">Nombre del Referente</label>
                    <input type="text" class="form-control" id="nombre_referente" name="nombre_referente">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="referente">Referente</label>
                    <input type="text" class="form-control" id="referente" name="referente">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="cuit">CUIT</label>
                    <input type="text" class="form-control" id="cuit" name="cuit">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="matricula_inaes">Matrícula INAES</label>
                    <input type="text" class="form-control" id="matricula_inaes" name="matricula_inaes">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="registro_provincial_dipac">Registro Provincial DIPAC</label>
                    <input type="text" class="form-control" id="registro_provincial_dipac" name="registro_provincial_dipac">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inscriptos_renatep">¿Inscriptos en RENATEP?</label>
                    <input type="checkbox" id="inscriptos_renatep" name="inscriptos_renatep">
                </div>
                <div class="form-group col-12">
                    <label for="cooperativa_registro_nacional_efectores">¿Cooperativa en Registro Nacional de Efectores?</label>
                    <input type="checkbox" id="cooperativa_registro_nacional_efectores" name="cooperativa_registro_nacional_efectores">
                </div>
                <div class="form-group col-12">
                    <label for="inscriptos_sipro">¿Inscriptos en SIPRO?</label>
                    <input type="checkbox" id="inscriptos_sipro" name="inscriptos_sipro">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="cantidad_trabajadores">Cantidad de Trabajadores</label>
                    <input type="number" class="form-control" id="cantidad_trabajadores" name="cantidad_trabajadores">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="trabajadores_mujeres_diversidades">Trabajadores Mujeres/Diversidades</label>
                    <input type="number" class="form-control" id="trabajadores_mujeres_diversidades" name="trabajadores_mujeres_diversidades">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="porcentaje_mujeres_diversidades">Porcentaje Mujeres/Diversidades</label>
                    <input type="number" step="0.01" class="form-control" id="porcentaje_mujeres_diversidades" name="porcentaje_mujeres_diversidades">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="trabajadores_discapacidad">¿Trabajadores con Discapacidad?</label>
                    <input type="checkbox" id="trabajadores_discapacidad" name="trabajadores_discapacidad">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="escala_produccion">Escala de Producción</label>
                    <input type="number" class="form-control" id="escala_produccion" name="escala_produccion">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="fecha_inscripcion">Fecha de Inscripción</label>
                    <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="url">URL</label>
                    <input type="url" class="form-control" id="url" name="url">
                </div>
            </div>

                <!-- Incluir multiselect de categorias -->


            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <!-- Incluir Axios desde el CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('provider-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevenir el envío del formulario por defecto
            
            const form = event.target;
            const formData = new FormData(form);

            axios.post('{{ url('api/providers') }}', formData)
                .then(response => {
                    alert('Proveedor creado exitosamente');
                    form.reset(); // Limpiar el formulario después de enviar los datos
                })
                .catch(error => {
                    console

                    console.error('Hubo un error al crear el proveedor:', error);
                    if (error.response && error.response.data && error.response.data.errors) {
                        // Mostrar errores específicos del servidor
                        const errors = error.response.data.errors;
                        let errorMessages = '';
                        for (const key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessages += errors[key].join(', ') + '\n';
                            }
                        }
                        alert('Errores al crear el proveedor:\n' + errorMessages);
                    } else {
                        alert('Error al crear el proveedor. Por favor, intente nuevamente.');
                    }
                });
        });
    </script>
@endsection


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop