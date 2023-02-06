@extends('layouts.app')
@section('content')


<div class='container mb-3'>
  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pets">
        Agregar mascotas 
      </button>    
    </div>
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#calendar">
        agregar cita 
      </button>    
    </div>
  </div>
</div >


<div class="container">

    <div id="agenda">calendario</div>
</div>

<!-- Modal pets -->
<div class="modal fade" id="pets" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mascotas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form  method="POST" action="{{route('pets.store')}}">

      {{ csrf_field() }}

      <div class="form-row">
        <div class="col">
          <div class="form-group">
          <label for="id_pet">ID mascota</label>
          <input type="text" class="form-control" id="id_pet" name="id_pet" placeholder="identificacion mascota">
          <small id="helpId" class="form-text text-muted"> identificacion mascota</small>
          </div>
       </div>
     <div class="col">
    <div class="form-group">
          <label for="name_pet">nombre</label>
          <input type="text" class="form-control" id="name_pet" name="name_pet" placeholder="ingrese el nombre de la mascota">
          <small id="helpId" class="form-text text-muted">Nombre mascota</small>
        </div>
  </div>

  <div class="col">
  <div class="input-group-prepend">
    <label class="input-group-text" for="typePet">tipo de mascota</label>
  </div>
  <select class="custom-select"name="typePet" id="typePet">
    <option selected>selecciona tu mascota</option>
    <option value="0">Perro</option>
    <option value="1">Gato</option>
    <option value="2">Conejo</option>
    <option value="3">Caballo</option>
  </select>
  </div>
  </div>  
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="btnGuardarP">Guardar</button>
          <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
          <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal appoitment 
<div class="modal fade" id="calendar" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Citas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <form>

      {{ csrf_field() }}

      <div class="form-row">
        <div class="col">
          <div class="form-group">
          <label for="id">ID mascota</label>
          <input type="text" class="form-control" id="id" name="id" placeholder="identificacion mascota">
          <small id="helpId" class="form-text text-muted"> identificacion mascota</small>
          </div>
       </div>
     <div class="col">
    <div class="form-group">
          <label for="date">Fecha</label>
          <input type="date" min="2023-02-01" class="form-control" id="date" name="date" >
          <small id="helpId" class="form-text text-muted">Fecha cita</small>
        </div>
  </div>

  <div class="col">
  <div class="form-group">
          <label for="date">Hora</label>
          <input type="time" min="08:00" max="18:00" class="form-control" id="time" name="time" >
          <small id="helpId" class="form-text text-muted">Hora cita</small>
        </div>
  </div>
  </div>  
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
          <button type="button" class="btn btn-warning" id="btnModificar">Modificar</button>
          <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
--></div>

@endsection