@extends('adminlte::page')
@section('title','HOME PHP')

@section('content')
    <div class="container"> 
      <div id="alert_param_lic" class="alert alert-danger alert-dismissible fade show" style="display:none">
        <button class="btn close"  onClick="hideAlert()">&times;</button>
      </div>
    <h1>Categorias</h1>
    <!-- Button trigger modal 

<a href="{{ url('category/create') }}" class="btn btn-primary"> Crear categoria</a>-->
<a href="#modalAddCategory" type="button" data-toggle="modal" data-target="#modalAddCategory" class="btn btn-primary">Crear categoria</a>
<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripciòn</th>
                <th scope="col">Acciones</th>
               
            </tr>
        </thead>
        <tbody id="categories-table-body">
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
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
 <!-- Incluir jQuery desde el CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log("Script cargado y DOM completamente cargado.");

    axios.get("{{ url('api/categories') }}")
        .then(response => {
            console.log("Datos recibidos:", response.data);
            const categories = response.data.data;

            const tbody = document.getElementById('categories-table-body');
            categories.forEach(category => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <th class="fa fa-calendar-times"></th>
                    <td>${category.name}</td>
                    <td>${category.description}</td>
                    <td><button class="btn btn-warning fa fa-edit" onClick="openLicModalLic(${category.id}, '${category.name}')"></button>
                    <button class="remove-data btn btn-danger" > <span class="fa fa-trash"></span>  </button></td>`;

                tbody.appendChild(tr);
            });
        })
        .catch(error => {
            console.error('Error al obtener las categorías:', error);
        });
});

</script>

    
      @include('categories.create')
@endsection
@section('custom-scripts')
 
@endsection