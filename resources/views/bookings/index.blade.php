@extends('layouts.app')
@section('titleModule', 'Modelo Reserva')

@section('head')
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="insert">
        @foreach ($bookings as $booking)
            <div class="card card-hover" style="width: 18rem; display: inline-block; margin: 10px;">
                <div class="card-body">

                    <p class="card-text">

                        <strong>Descripción:</strong> {{ $booking->description }} <br>
                        <strong>Usuario:</strong> {{ $booking->user_id }} <br>
                        <strong>Habitación:</strong> {{ $booking->room_id }} <br>
                        <strong>Id:</strong> {{ is_object($booking->user) ? $booking->user->id : 'Id no encontrado' }} <br>
                        <strong>Nombre:</strong> {{ is_object($booking->user) ? $booking->user->name : 'Usuario no encontrado' }}<br>
                        <strong>Apellido:</strong>{{ is_object($booking->user) ? $booking->user->lastname : 'Usuario no encontrado' }} <br>
                        <strong>Documento:</strong>
                        {{ is_object($booking->user) ? $booking->user->document : 'Usuario no encontrado' }} <br>
                        <strong>Dirección:</strong>
                        {{ is_object($booking->user) ? $booking->user->address : 'Usuario no encontrado' }} <br>
                        <strong>Teléfono:</strong>
                        {{ is_object($booking->user) ? $booking->user->phone : 'Usuario no encontrado' }} <br>
                        <strong>Corréo:</strong>
                        {{ is_object($booking->user) ? $booking->user->email : 'Usuario no encontrado' }} <br>
                        <strong>Rol:</strong> {{ is_object($booking->user) ? $booking->user->role : 'Usuario no encontrado' }}<br>
                        <strong>Id:</strong> {{ is_object($booking->room) ? $booking->room->id : 'Usuario no encontrado' }} <br>
                        <strong>Número_habitación:</strong>
                        {{ is_object($booking->room) ? $booking->room->number_room : 'Usuario no encontrado' }} <br>




                        <button type="button" class="btn btn-block edit" data-bs-toggle="modal" data-bs-target="#exampleEdit"
                            id='{{ $booking->id }}'>Editar </button>
                        <button data-bs-toggle="modal" data-bs-target="#exampleDelete"
                            class="btn  btn-user btn-block delete" id='{{ $booking->id }}'>Eliminar </button>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal crear --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">crear</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('bookings.store') }}" class="booking">
                        @csrf
                       {{--  <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Seleccione el usuario:</label>
                                <select name="user_id" class="form-control form-control.user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Seleccione la habitación:</label>
                            <select name="room_id" class="form-control form-control-user">
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->number_room }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group row">
                            <div class="form-group center">
                                <input name="description" type="text" class="form-control form-control-user"
                                    id="exampleDescription" placeholder="Descripción">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="user_id" type="number" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Usuario">
                            </div>
                            <div class="col-sm-6">
                                <input name="room_id" type="number" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Habitación">
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btnthree" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnthree">Crear</button>
                        </div> --}}
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- MOdal editar --}}
    <div class="modal fade" id="exampleEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formEdit" action="{{ url('bookings/' . $booking->id) }}" class="booking">
                        @csrf
                        @method('PUT')
                       {{--   <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Seleccione el usuario:</label>
                                <select name="user_id" class="form-control form-control.user">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Seleccione la habitación:</label>
                            <select name="room_id" class="form-control form-control-user">
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->number_room }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--  <div class="form-group row">
                            <div class="form-group center">
                                <input name="description" type="text" class="form-control form-control-user"
                                    id="exampleDescription" placeholder="Descripción">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="user_id" type="text" class="form-control form-control-user"
                                    id="exampleUsuarioEdit" placeholder="Usuario">
                            </div>
                            <div class="col-sm-6">
                                <input name="room_id" type="text" class="form-control form-control-user"
                                    id="exampleRoomEdit" placeholder="Habitación">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btnone " data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnone ">Editar</button>
                        </div> --}}

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formdelete" action="{{ url('bookings/' . $booking->id) }}" class="user">
                        @csrf
                        @method('DELETE')
                        <div class="form-group row">
                            <label for="">¿Desea eliminar el usuario de forma permanente?</label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btntwo  btn-icon-split" data-bs-dismiss="modal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Cancelar</span>

                            </button>
                            <button type="submit" name="id" class="btn btntwo btn-icon-split">
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
            var bookingId = $(this).attr('id');

            $.get('bookings/' + bookingId + '/edit', {}, function(data) {
                var booking = data.booking
                $('input[name="id"]').val(bookingId);
                $('input[name="descriptionEdit"]').val(booking.description);


                console.log(booking)
            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var bookingId = form.find('input[name="id"]').val();
            var url = "/bookings/" + bookingId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize()
            }).always(function(response) {
                console.log("Edicion  exitosa", response);
                $('#exampleEdit').modal('hide');
                location.reload();
            });
        });

        //jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var bookingId = $(this).attr('id');
            $('button[name="id"]').val(bookingId);
        })

        $('#formdelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var bookingId = form.find('button[name="id"]').val();
            var url = "/bookings/" + bookingId;

            $.ajax({
                url: url,
                type: 'DELETE',
                data: form.serialize()


            }).always(function(response) {
                console.log("Eliminación exitosa", response);
                $('exampledelete').modal('hide');
                location.reload();
            });
        });

        //jquery para el modal de buscar
        $('#qsearch').on('keyup', function(e) {
            e.preventDefault();
            $query = $(this).val();
            $token = $('input[name=_token]').val();

            $.post('bookings/search', {
                    q: $query,
                    _token: $token
                },
                function(data) {
                    $('.insert').empty().append(data);
                }
            )
        })

        // Jquery para cambiar la imagen
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = "block";
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


@endsection
