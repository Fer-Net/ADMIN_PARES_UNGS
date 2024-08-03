@extends('adminlte::page')
@section('title','HOME PHP')

@section('content')
    <div class="container"> 
      <div id="alert_param_lic" class="alert alert-danger alert-dismissible fade show" style="display:none">
        <button class="btn close"  onClick="hideAlert()">&times;</button>
      </div>
    <h1>Proveedores</h1>
    <!-- Button trigger modal -->

<a href="{{ url('category/create') }}" class="btn btn-primary"> Crear categoria</a>
<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Codigo</th>
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
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            axios.get("{{ url('api/categories') }}") // Change to your actual API endpoint
                .then(response => {
                    const providers = response.data.data;
                  
                    const tbody = document.getElementById('providers-table-body');
                    providers.forEach(provider => {
                        const tr = document.createElement('tr');

                        tr.innerHTML = `
                            <th class="fa fa-calendar-times"></th>
                            <td>${provider.nombre}</td>
                            <td>${provider.descripcion}</td>
                            <td><button class="btn btn-warning fa fa-edit" onClick="openLicModalLic(${provider.id},'${provider.nombre}')"></button></td>`;

                        tbody.appendChild(tr);
                    });
                })
                .catch(error => {
                    console.error('There was an error fetching the providers:', error);
                });
        });
          </script>
      
@endsection
