@extends('adminlte::page')
@section('title','HOME PHP')

@section('content')
    <div class="container"> 
      <div id="alert_param_lic" class="alert alert-danger alert-dismissible fade show" style="display:none">
        <button class="btn close"  onClick="hideAlert()">&times;</button>
      </div>
    <h1>Proveedores</h1>
    <!-- Button trigger modal -->
            @csrf

<a href="{{ url('provider/create') }}" class="btn btn-primary"> Crear proveedor</a>
<table id="datalist" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
               
            </tr>
        </thead>
        <tbody id="providers-table-body">
            <!-- Rows will be inserted here by JavaScript -->
        </tbody>
    </table>
      {{-- Pagination --}}
      <div class="d-flex justify-content-center">
   
    </div>
    <div id="modalView">
    </div> 
    </div>
     <!-- Incluir Axios desde el CDN -->
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <!-- Incluir jQuery desde el CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Incluir Axios desde el CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            axios.get("{{ url('api/providers') }}") // Change to your actual API endpoint
                .then(response => {
                    const providers = response.data.data;
                  
                    const tbody = document.getElementById('providers-table-body');
                    providers.forEach(provider => {
                        const tr = document.createElement('tr');

                        tr.innerHTML = `
                            <th class="fa fa-calendar-times"></th>
                            <td>${provider.id}</td>
                            <td>${provider.nombre}</td>
                            <td>${provider.descripcion}</td>
                            <td><button class="btn btn-warning fa fa-edit" onClick="window.location.href='{{ url('provider/edit/') }}' +'/'+ ${provider.id}"></button>
                            <button class="remove-data btn btn-danger" > <span class="fa fa-trash"></span>  </button></td>
                            `;



                            
                        tbody.appendChild(tr);
                    });
                })
                .catch(error => {
                    console.error('There was an error fetching the providers:', error);
                });
        });

        $(document).on('click', '.remove-data', function() {

    var id = $(this).parents('tr').find('td:eq(0)').text(); // obtener el valor de la columna nombre

    Swal.fire({
        title: "Eliminar el proveedor?",
        text: "Se borrará permanetemente el proveedor",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "red",
        confirmButtonText: "Si, borrar",
        showLoaderOnConfirm: true,

        preConfirm: () => {
    return axios.post("{{ url('api/providers/') }}" + "/delete/" + id)
        .then(response => {
            Swal.fire({
                title: "Noticia eliminada",
                text: "Se ha eliminado correctamente la pregunta",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                location.reload();  // This reloads the page when "OK" is pressed
            });
                
        })
        .catch(error => {
            Swal.fire("Error",
                "Ocurrió un error al eliminar la pregunta",
                "error");
        });
}
    });
    return false;
});

          </script>
      
@endsection
