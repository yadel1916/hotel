@extends('layouts.app')
@section('titleModule', 'Modelo Usuario')

@section('head')
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="insert">
        @foreach ($users as $user)
            <div class="card card-hover" style="width: 18rem; display: inline-block; margin: 10px;">
                <img class="foto rounded-circle mt-4 mx-auto my-auto d-block"
                    src="{{ asset('profile_images/' . $user->photo) }}" alt="..." style="width:85%" height="260">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }} {{ $user->lastname }}</h5>
                    <p class="card-text">
                        <strong>Documento:</strong> {{ $user->document }} <br>
                        <strong>Dirección:</strong> {{ $user->address }} <br>
                        <strong>Teléfono:</strong> {{ $user->phone }} <br>
                        <strong>Email:</strong> {{ $user->email }} <br>
                        <strong>Rol:</strong> {{ $user->role }} <br>
                        <button type="button" class="btn btn-block edit" data-bs-toggle="modal"
                            data-bs-target="#exampleEdit" id='{{ $user->id }}'>Editar </button>
                        <button data-bs-toggle="modal" data-bs-target="#exampleDelete"
                            class="btn  btn-user btn-block delete" id='{{ $user->id }}'>Eliminar </button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('users.store') }}" class="user">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="name" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input name="lastname" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="document" type="text" class="form-control form-control-user"
                                id="exampleDocument" placeholder="Documento">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="address" type="text" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Dirección">
                            </div>
                            <div class="col-sm-6">
                                <input name="phone" type="text" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo Electrónico">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="password" type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña">
                            </div>
                            <div class="col-sm-6">
                                <input name="password_confirmation" type="password" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Confirmar contraseña">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role">
                                <option value="customer">usuario</option>
                                <option value="admin">administrador</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btnthree" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnthree">Crear</button>
                        </div>
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
                    <form method="POST" id="formEdit" action="{{ url('users/' . $user->id) }}" class="user">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <input name="id" type="text" class="form-control form-control-user" hidden>
                            <div class="col-sm-6 mb-3 mb-sm-0">

                                <input name="nameEdit" type="text" class="form-control form-control-user"
                                    id="exampleFirstName" placeholder="Nombre">
                            </div>
                            <div class="col-sm-6">
                                <input name="lastnameEdit" type="text" class="form-control form-control-user"
                                    id="exampleLastName" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="documentEdit" type="text" class="form-control form-control-user"
                                id="exampleDocument" placeholder="Documento">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="addressEdit" type="text" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Dirección">
                            </div>
                            <div class="col-sm-6">
                                <input name="phoneEdit" type="text" class="form-control form-control-user"
                                    id="exampleRepeatPassword" placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="emailEdit" type="email" class="form-control form-control-user"
                                id="exampleInputEmail" placeholder="Correo Electrónico">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="roleEdit">
                                <option value="Usuario">usuario</option>
                                <option value="Administtrador">administrador</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btnone " data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btnone ">Editar</button>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formdelete" action="{{ url('users/' . $user->id) }}" class="user">
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
            var userId = $(this).attr('id');

            $.get('users/' + userId + '/edit', {}, function(data) {
                var user = data.user
                $('input[name="id"]').val(userId);
                $('input[name="nameEdit"]').val(user.name);
                $('input[name="lastnameEdit"]').val(user.lastname);
                $('input[name="documentEdit"]').val(user.document);
                $('input[name="addressEdit"]').val(user.address);
                $('input[name="phoneEdit"]').val(user.phone);
                $('input[name="emailEdit"]').val(user.email);
                $('select[name="roleEdit"]').val(user.role);

            })
        })

        $('#formEdit').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var userId = form.find('input[name="id"]').val();
            var url = "/users/" + userId;

            $.ajax({
                url: url,
                type: 'PUT',
                data: form.serialize()
            }).always(function(response) {
                console.log("Edicion  exitosa", response);
                $('exampledelete').modal('hide');
                location.reload();
            });
        });

        //jquery para el modal de eliminar
        $(document).on('click', '.delete', function() {
            var userId = $(this).attr('id');
            $('button[name="id"]').val(userId);
        })

        $('#formdelete').submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var userId = form.find('button[name="id"]').val();
            var url = "/users/" + userId;

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

            $.post('users/search', {
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
