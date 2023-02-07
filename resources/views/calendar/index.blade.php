@extends('layouts.app')
@section('content')


<div class='container mb-3'>
  <div class="row">
    <div class="col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pets">
        Agregar mascotas 
      </button>    
    </div>
  </div>
</div >
<div class='container'>
  @if(!empty($pets))
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">identificacion mascota</th>
      <th scope="col">Nombre mascota</th>
      <th scope="col">Tipo mascota</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    @foreach($pets as $pet)
    <tr>
      <th scope="row">{{$pet->id_pet}}</th>
      <td>{{$pet->pet_name}}</td>
      <td>{{$pet->pet_type}}</td>
      <td>
      <div class="form-row">
            <div class="col">
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit{{$pet->id_pet}}">
        Editar
      </button>

      <div class="modal fade" id="edit{{$pet->id_pet}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Mascotas</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
        
      <form  method="POST" action="{{route('pets.edit',[$pet->id_pet])}}">

      {{ csrf_field() }}

      <div class="form-row">

        <div class="col">
          <div class="form-group">
          <label for="id_pet">ID mascota</label>
          <input type="text" class="form-control" id="id_pet" name="id_pet" value="{{$pet->id_pet}}" disabled>
          <small id="helpId" class="form-text text-muted"> identificacion mascota</small>
          </div>
       </div>
     
       <div class="col">
    <div class="form-group">
          <label for="name_pet">nombre</label>
          <input type="text" class="form-control" id="name_pet" name="name_pet" value="{{$pet->pet_name}}" >
          <small id="helpId" class="form-text text-muted">Nombre mascota</small>
        </div>
  </div>

  <div class="col">
  <div class="input-group-prepend">
    <label class="input-group-text" for="typePet">tipo de mascota</label>
  </div>
  <select class="custom-select"name="typePet" id="typePet" value="{{$pet->pet_type}}">
    <option value="{{$pet->pet_type}}"></option>
    <option value="0">Perro</option>
    <option value="1">Gato</option>
    <option value="2">Conejo</option>
    <option value="3">Caballo</option>
  </select>
  </div>
  </div>  
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
      </div>


              <div class="col">
              <form action="{{ route('pets.destroy',[$pet->id_pet]) }}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <button type='submit' class="btn btn-danger">
                  Delete
                </button>
              </form>
</div>
              <div class="col">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cit{{$pet->id_pet}}">
        Nueva cita
      </button>
                                      <!-- Modal appoitment -->
                            <div class="modal fade" id="cit{{$pet->id_pet}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Citas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    
                                  <form method="POST" action="{{ route('appointment.store') }}" >

                                  @csrf                                  
                                  <div class="form-row">
                                    <div class="col">
                                      <div class="form-group">
                                      <label for="idPets">ID mascota</label>
                                      <input type="text" class="form-control" id="idPet" name="idPet" value="{{$pet->id_pet}}" disabled>
                                      <input type="hidden" class="form-control" id="idPets" name="idPets" value="{{$pet->id_pet}}">
                                      <small id="helpId" class="form-text text-muted"> identificacion mascota</small>
                                      </div>
                                  </div>
                                <div class="col">
                                <div class="form-group">
                                      <label for="date">Fecha inicio</label>
                                      <input type="datetime-local" min="2023-02-01" class="form-control" id="date" name="date" >
                                      <small id="helpId" class="form-text text-muted">Fecha inicio cita</small>
                                    </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                      <label for="time">Fecha fin</label>
                                      <input type="datetime-local" min="2023-02-01" class="form-control" id="time" name="time" >
                                      <small id="helpId" class="form-text text-muted">Fecha fin cita</small>
                                    </div>
                              </div>
                              
                              </div>  
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-success">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                            </div>


      <div>
              
      </td>
    </tr>
    </div>
    </div>

    @endforeach
  </tbody>
</table>
@endif
</div >


<div class="container">

    <div id="calendar"></div>

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
          <button type="submit" class="btn btn-success" >Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          events: @json($events),
          locale:"es",
          headerToolbar:{
            left:'prev,next today',
            center:'title',
            right:'dayGridMonth, timeGridWeek, listWeek'
          },
        });
        calendar.render();
      });
</script>
@endpush