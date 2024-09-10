@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container"> 
        <div id="alert_param_lic" class="alert alert-danger alert-dismissible fade show" style="display:none">
            <button class="btn close" onClick="hideAlert()">&times;</button>
        </div>
        <h1>Editar Proveedor</h1>

        <!-- Formulario para editar un proveedor -->
        <form id="provider-form">
            @csrf
            @method('PUT') <!-- Para enviar una solicitud de actualización -->

            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $provider->nombre }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
    <label for="tipo">Tipo</label>
    <select class="form-control" id="tipo" name="tipo" required>
        <option value="">Seleccionar</option> <!-- Opción por defecto -->
        <option value="1" {{ $provider->tipo == '1' ? 'selected' : '' }}>Entidades mutuales y cooperativas registradas en el INAES</option>
        <option value="2" {{ $provider->tipo == '2' ? 'selected' : '' }}>Emprendimientos asociativos con matrícula en trámite (precooperativas)</option>
        <option value="3" {{ $provider->tipo == '3' ? 'selected' : '' }}>Emprendimientos asociativos productivos o de servicios de la Economía Popular</option>
        <option value="4" {{ $provider->tipo == '4' ? 'selected' : '' }}>Microempresas locales / emprendimientos familiares</option>
    </select>
</div>

            <div class="form-row">
                <div class="form-group col-12">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion">{{ $provider->descripcion }}</textarea>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-12 col-md-6">
    <label for="distrito">Distrito</label>
    <select class="form-control" id="distrito" name="distrito" required>
        <option value="1" {{ $provider->distrito == '1' ? 'selected' : '' }}>Malvinas Argentinas</option>
        <option value="2" {{ $provider->distrito == '2' ? 'selected' : '' }}>San Miguel</option>
        <option value="3" {{ $provider->distrito == '3' ? 'selected' : '' }}>José C. Paz</option>
        <option value="4" {{ $provider->distrito == '4' ? 'selected' : '' }}>Pilar</option>
        <option value="5" {{ $provider->distrito == '5' ? 'selected' : '' }}>Hurlingham</option>
        <option value="6" {{ $provider->distrito == '6' ? 'selected' : '' }}>Escobar</option>
        <option value="7" {{ $provider->distrito == '7' ? 'selected' : '' }}>Ituzaingó</option>
        <option value="8" {{ $provider->distrito == '8' ? 'selected' : '' }}>Morón</option>
        <option value="9" {{ $provider->distrito == '9' ? 'selected' : '' }}>Tigre</option>
        <option value="10" {{ $provider->distrito == '10' ? 'selected' : '' }}>Lujan</option>
        <option value="11" {{ $provider->distrito == '11' ? 'selected' : '' }}>Gral Rodriguez</option>
        <option value="12" {{ $provider->distrito == '12' ? 'selected' : '' }}>San Martin</option>
        <option value="13" {{ $provider->distrito == '13' ? 'selected' : '' }}>Moreno</option>
        <option value="14" {{ $provider->distrito == '14' ? 'selected' : '' }}>Tres de Febrero</option>
        <option value="15" {{ $provider->distrito == '15' ? 'selected' : '' }}>Otro</option>
    </select>
</div>
<div class="form-group col-12 col-md-6" id="otro-distrito-container" style="display: {{ $provider->distrito == '15' ? 'block' : 'none' }};">
    <label for="otro-distrito">Especificar otro distrito</label>
    <input type="text" class="form-control" id="otro-distrito" name="otro-distrito" value="{{ $provider->distrito == '15' ? $provider->otro_distrito : '' }}">
</div>

                <div class="form-group col-12 col-md-6">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $provider->direccion }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $provider->email }}" required>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $provider->phone }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="existen_registros_compras_ungs">¿Existen registros de compras UNGS?</label>
                    <input type="checkbox" id="existen_registros_compras_ungs" name="existen_registros_compras_ungs" {{ $provider->existen_registros_compras_ungs ? 'checked' : '' }}>
                </div>
                <div class="form-group col-12">
                    <label for="correo_electronico">Correo Electrónico</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ $provider->correo_electronico }}">
                </div>
                <div class="form-group col-12">
                    <label for="pagina_web">Página Web</label>
                    <input type="url" class="form-control" id="pagina_web" name="pagina_web" value="{{ $provider->pagina_web }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="nombre_referente">Nombre del Referente</label>
                    <input type="text" class="form-control" id="nombre_referente" name="nombre_referente" value="{{ $provider->nombre_referente }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="referente">Referente</label>
                    <input type="text" class="form-control" id="referente" name="referente" value="{{ $provider->referente }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $provider->cargo }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="cuit">CUIT</label>
                    <input type="text" class="form-control" id="cuit" name="cuit" value="{{ $provider->cuit }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="matricula_inaes">Matrícula INAES</label>
                    <input type="text" class="form-control" id="matricula_inaes" name="matricula_inaes" value="{{ $provider->matricula_inaes }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="registro_provincial_dipac">Registro Provincial DIPAC</label>
                    <input type="text" class="form-control" id="registro_provincial_dipac" name="registro_provincial_dipac" value="{{ $provider->registro_provincial_dipac }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inscriptos_renatep">¿Inscriptos en RENATEP?</label>
                    <input type="checkbox" id="inscriptos_renatep" name="inscriptos_renatep" {{ $provider->inscriptos_renatep ? 'checked' : '' }}>
                </div>
                <div class="form-group col-12">
                    <label for="cooperativa_registro_nacional_efectores">¿Cooperativa en Registro Nacional de Efectores?</label>
                    <input type="checkbox" id="cooperativa_registro_nacional_efectores" name="cooperativa_registro_nacional_efectores" {{ $provider->cooperativa_registro_nacional_efectores ? 'checked' : '' }}>
                </div>
                <div class="form-group col-12">
                    <label for="inscriptos_sipro">¿Inscriptos en SIPRO?</label>
                    <input type="checkbox" id="inscriptos_sipro" name="inscriptos_sipro" {{ $provider->inscriptos_sipro ? 'checked' : '' }}>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="cantidad_trabajadores">Cantidad de Trabajadores</label>
                    <input type="number" class="form-control" id="cantidad_trabajadores" name="cantidad_trabajadores" value="{{ $provider->cantidad_trabajadores }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="trabajadores_mujeres_diversidades">Trabajadores Mujeres/Diversidades</label>
                    <input type="number" class="form-control" id="trabajadores_mujeres_diversidades" name="trabajadores_mujeres_diversidades" value="{{ $provider->trabajadores_mujeres_diversidades }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="porcentaje_mujeres_diversidades">Porcentaje Mujeres/Diversidades</label>
                    <input type="number" step="0.01" class="form-control" id="porcentaje_mujeres_diversidades" name="porcentaje_mujeres_diversidades" value="{{ $provider->porcentaje_mujeres_diversidades }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="trabajadores_discapacidad">¿Trabajadores con Discapacidad?</label>
                    <input type="checkbox" id="trabajadores_discapacidad" name="trabajadores_discapacidad" {{ $provider->trabajadores_discapacidad ? 'checked' : '' }}>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="escala_produccion">Escala de Producción</label>
                    <input type="number" class="form-control" id="escala_produccion" name="escala_produccion" value="{{ $provider->escala_produccion }}">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="fecha_inscripcion">Fecha de Inscripción</label>
                    <input type="date" class="form-control" id="fecha_inscripcion" name="fecha_inscripcion" value="{{ $provider->fecha_inscripcion }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="url">URL</label>
                    <input type="url" class="form-control" id="url" name="url" value="{{ $provider->url }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    
@endsection


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<!-- Incluir jQuery desde el CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>    
     $(document).ready(function() {
        $('#distrito').on('change', function() {
            if ($(this).val() === '15') {
                $('#otro-distrito-container').show();
            } else {
                $('#otro-distrito-container').hide();
                $('#otro-distrito').val(''); // Limpiar el campo de texto si se oculta
            }
        });

        // Mostrar el campo de texto si el valor inicial es '15' (Otro)
        if ($('#distrito').val() === '15') {
            $('#otro-distrito-container').show();
        }
    }); </script>
@stop