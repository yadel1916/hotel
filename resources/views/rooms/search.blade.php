@forelse ($rooms as $room)
<div class="card card-hover" style="width: 18rem; display: inline-block; margin: 10px;">
    <div class="card-body">
        <p class="card-text">
            <strong>Numero_habitación:</strong> {{ $room->number_room }} <br>
            <strong>Nombre_usuario:</strong> {{ $room->user_name }} <br>

            <button type="button" class="btn  btn-user btn-block edit" data-bs-toggle="modal"
                data-bs-target="#exampleEdit" id='{{ $room->id }}'>Editar </button>
            <button data-bs-toggle="modal" data-bs-target="#exampleDelete"
                class="btn  btn-user btn-block delete" id='{{ $room->id }}'>Eliminar </button>
        </p>
    </div>
</div>
    @empty
    No encontro registros para el criterio de busqueda
@endforelse
