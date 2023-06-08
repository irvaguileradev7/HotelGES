@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">

                <div class="container">
                    <div class="pull-left">
                        <h1>Servicios</h1>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('services.create') }}">Nuevo servicio</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <br>
        <div class="container">
            <table class="table table-bordered align-middle">
                <tr>
                    <th>Num.</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Detalles</th>
                    <th width="280px">Acciones</th>
                </tr>

                @foreach ($services as $service)
                    <tr class="white-cell">
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->type }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->details }}</td>

                        <td>
                            <form id="delete-form-{{ $service->id }}" action="{{ route('services.destroy', $service->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <table>
                                    <tr>
                                        <td class="non-cell">
                                            <a class="btn btn-info" href="{{ route('services.show', $service->id) }}">Ver</a>
                                        </td>
                                        <td class="non-cell">
                                            <a class="btn btn-primary"
                                                href="{{ route('services.edit', $service->id) }}">Editar</a>
                                        </td>
                                        <td class="non-cell">
                                            <button type="submit" class="btn btn-danger"
                                                onclick="confirmDelete(event, {{ $service->id }})">Eliminar</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </table>

        </div>


        {{-- <script>
            function confirmDelete(event, roomId) {
                event.preventDefault();
                if (confirm('¿Está seguro que desea eliminar esta habitación?')) {
                    document.getElementById('delete-form-' + roomId).submit();
                }
            }
        </script> --}}
    </div>
@endsection
