@extends('layouts.app')
@section('titleModule', 'Habitaciones')

@section('content')

    <div class="insert">
        @foreach ($rooms as $room)
            <div class="card card-hover" style="width: 18rem; display: inline-block; margin: 10px;">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Numero_habitación:</strong> {{ $room->number_room }} <br>
                        <strong>Nombre_usuario:</strong> {{ $room->user_name }} <br>

                        <button type="button" class="btn  btn-user btn-block edit" data-bs-toggle="modal"
                            data-bs-target="#editExample" id='{{ $room->id }}'>Editar </button>
                        <button data-bs-toggle="modal" data-bs-target="#exampleDelete"
                            class="btn  btn-user btn-block delete" id='{{ $room->id }}'>Eliminar </button>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    {{--Modal Crear--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reservar habitación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('rooms.store') }}" class="room">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="number_room" type="text" class="form-control form-control-user"
                                    id="exampleNumberRoom" placeholder="Numero_habitación">
                            </div>
                            <div class="col-sm-6">
                                <input name="user_name" type="text" class="form-control form-control-user"
                                    id="exampleNameUser" placeholder="Nombre_usuario">
                            </div>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btnfour" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnfour">Reservar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    
    {{-- MOdal editar --}}
    <div class="modal fade" id="editExample" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdit" action="{{ url('rooms/' . $room->id) }}" class="room" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-room" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                
                                <input name="number_roomEdit" type="number" class="form-control form-control-room"
                                    id="exampleNumberEdit" placeholder="Numero_habitación">
                                
                            </div>
                            <div class="col-sm-6">
                                <input name="user_nameEdit" type="text" class="form-control form-control-room"
                                    id="exampleNameRoom" placeholder="Nombre_usuario">
                                
                            </div>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btnfour" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnfour">Editar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div> 
    

    {{-- MOdal delete --}}
    <div class="modal fade" id="exampleDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formdelete" action="{{ url('rooms/'. $room->id) }}" class="room">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row">
                            <label for="">Desea eliminar el usuario de forma permanente</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btnfour btn-icon-split" data-bs-dismiss="modal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Cancelar</span>

                            </button>
                            <button type="submit" name="id" class="btn btnfour btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Eliminar</span>

                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        //jquery para el modal de editar
        $(document).on('click', '.edit', function() {
            var roomId = $(this).attr('id');
            $('button[name="id"]').val(roomId);

            $.get('rooms/' + roomId + '/edit', {}, function(data) {
                var room = data.room
                $('input[name="id"]').val(roomId);
                $('input[name="number_roomEdit"]').val(room.number_room);
                $('input[name="user_nameEdit"]').val(room.user_name);

                console.log(room) 

            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var roomId = form.find('input[name="id"]').val();
            var url = "/rooms/" + roomId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize()
            }).always(function(response) {
                console.log("Edicion  exitosa", response);
                $('#editExample').modal('hide');
                location.reload();
            });
        });

        //jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var roomId = $(this).attr('id');
            $('button[name="id"]').val(roomId);
        })

        $('#formdelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var roomId = form.find('button[name="id"]').val();
            var url = "/rooms/" + roomId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()


            }).always(function(response) {
                console.log("Eliminación exitosa", response);
                $('#exampleDelete').modal('hide');
                location.reload();
            });
        });

        //jquery para el modal de buscar
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('rooms/search', {
                    q: $query,
                    _token: $token
                },
                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })
    </script>


@endsection
