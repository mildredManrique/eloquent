@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto">
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        -{{ $error}} <br>
                        @endforeach
                    </div>
                    @endif

                    <form action="{{ route('formulario.store') }}" method="POST">
                        <div class="form-row">
                            <div class="col-sm-4">
                                <input type="text" name="name" class="form-control" placeholder="Autor">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="post" class="form-control" placeholder="Post">
                            </div>
                            <div class="col-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Autor</th>
                        <th>Post</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>

                        <td>
                            <ul>
                                @foreach ($user->posts as $post )
                                <li>
                                    {{ $post->title }}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <form action="{{ route('formulario.destroy', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que desea eliminar?')">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection