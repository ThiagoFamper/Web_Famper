@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dados do Cliente
                    <a href="{{url('cliente')}}"
                    class="btn btn-success btn-sm float-end">
                        Novo Cliente
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
                    @if(Route::is('cliente.show'))
                        {!! Form::model($cliente,
                        ['method'=>'PATCH',
                        'url'=>'cliente/'.$cliente->id]) !!}
                    @else
                        {!! Form::open(['method'=>'POST', 'url'=>'cliente']) !!}
                    @endif
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::input('text', 'nome',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Nome',
                        'required',
                        'maxlenght'=>50,
                        'autofocus']) !!}
                    {!! Form::label('endereco', 'Endereço') !!}
                    {!! Form::input('text', 'endereco',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Endereço',
                        'required',
                        'maxlenght'=>150]) !!}
                    {!! Form::label('fone', 'Telefone') !!}
                    {!! Form::input('text', 'fone',
                        null,
                        ['class'=>'form-control',
                        'placeholder'=>'Telefone',
                        'required',
                        'maxlenght'=>20]) !!}
                    {!! Form::submit('Salvar',
                    ['class'=>'float-end btn btn-primary mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection