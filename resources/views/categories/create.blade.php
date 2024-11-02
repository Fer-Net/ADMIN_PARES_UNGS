

<div class="modal fade" id="modalAddCategory">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" style="text-align: left; margin-left: 0;">Crear nueva categoría</h4>
            </div>
            <div class="modal-body">
                <form id="form" name="formAddCategory" class="form-horizontal form-row-seperated">
                    <div class="form-body">
                        <div class="form-group row"> 
                            <label class="control-label col-md-3">Nombre de categoría</label>
                            <div class="col-md-9">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <label class="control-label col-md-3">Descripción</label>
                            <div class="col-md-9">
                                <input type="text" id="description" name="description" class="form-control">
                            </div>
                        </div>
                        <!-- Token CSRF -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@section('js')

 <!-- Incluir jQuery desde el CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <!-- Incluir DataTables desde el CDN -->
 <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
 <!-- Incluir Axios desde el CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script> 


$("#form").on('submit', function(e) {
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
										text: "La categoría se ha creado correctamente",
										icon: "success",
										showCancelButton: false,
										confirmButtonColor: "#DD6B55",
										confirmButtonText: "Ok",
									}).then(function() {
											
											document.location.href = "{{ url('category') }}";	
                                            //cerrar el mmodal
                                            //actualizar la tabla con ajax

										});


						}

        });
    });
    
    </script>
@stop