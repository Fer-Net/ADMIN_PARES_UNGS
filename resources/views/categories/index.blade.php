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
    
      @include('categories.create')
@endsection
@section('custom-scripts')
 <!-- Incluir Axios desde el CDN -->
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
 <!-- Incluir jQuery desde el CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

        $("#formAddCategory").on('submit', function(e) {
        e.preventDefault();
     
        //showSpinner();
        $.ajax({
            method: "POST",
            url: "{{url('api/categories/create')}}",
            data: new FormData($('#form')[0]),
            processData: false,
            contentType: false,
	       
        }).done(function(response) {

						if (!response.success) {
                         
								Swal.fire("Oops...", response.message, "error");
						} else {
                      
								Swal.fire({
										title: "Éxito",
										text: "El proveedor se ha creado correctamente",
										icon: "success",
										showCancelButton: false,
										confirmButtonColor: "#DD6B55",
										confirmButtonText: "Ok",
									}).then(function() {
											
											document.location.href = "{{ url('provider') }}";										 
										});


						}

        });
    });
          </script>
@endsection