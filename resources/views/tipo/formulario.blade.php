@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Tipo
                    <a href="{{url('tipo')}}"
                    class="btn btn-success btn-sm float-end">
                        Novo Tipo
                    </a>
                </div>
                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">
                            {{Session::get('mensagem_sucesso')}}
                        </div>
                    @endif
                    @if(Session::has('mensagem_erro'))
                        <div class="alert alert-danger">
                            {{ Session::get('mensagem_erro') }}
                        </div>
                    @endif
                    @if(Route::is('tipo.show'))
                        {!! Form::model($tipo,
                        ['method'=>'PATCH',
                        'url'=>'tipo/'.$tipo->id]) !!}
                    @else
                        {!! Form::open(['method'=>'POST', 'url'=>'tipo']) !!}
                    @endif
                    {!! Form::label('titulo', 'Titulo') !!}
                    {!! Form::input('text', 'titulo',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Titulo',
                        'required',
                        'maxlenght'=>50,
                        'autofocus']) !!}
                    {!! Form::label('icone', 'Icone (URL)') !!}
                    {!! Form::input('text', 'icon',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Icone',
                        'required',
                        'maxlenght'=>150]) !!}
                    {!! Form::submit('Salvar',
                        ['class'=>'float-end btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
