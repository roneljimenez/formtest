@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (isset($message))
            <h5>{{$message}}</h5>
        @endif
            <div class="card">
                <div class="card-header">Formulario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($usuario['canSendForm'])
                        <form action="{{ route('sendForm') }}" method="POST">
                            <div class="form-group">
                                <label for="texto">Texto del envio</label>
                                <textarea class="form-control" id="texto" rows="3" name="contenido"></textarea>
                            </div>
                            <input type="hidden" name="usuario" value="{{ $usuario['email'] }}">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            @csrf
                        </form>
                    @else
                        <h4>Bienvend@ a la App, no tienes autorización para enviar Formularios</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
