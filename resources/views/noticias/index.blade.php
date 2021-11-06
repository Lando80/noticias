@extends('adminlte::page')

@section('title', 'Início')

@section('content_header')
<h1 class="m-0 text-dark"><i class="fas fa-home"></i> Início
    <small class="text-muted">- Bem-vindo ao sistema do Curso Flexpeak</small>
</h1>
@stop

@section('content')
    <div class="row">
        
    

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Noticias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="container pt-5">
    <h3> Listagem de Noticias</h3>
    
    @if(session()->has('mensagem'))
            <div class="alert alert-success">
                {{ session()->get('mensagem') }}
            </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <p><strong>Erro ao realizar esta operação</strong></p>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    
    <a href="/noticias/create" class="btn btn-primary">Nova Notícia</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ações</th>
                <th scope="col">Título</th>
                <th scope="col">Conteúdo</th>
                <th scope="col">Status</th>
                <th scope="col">Data Publicacao</th>
                <th scope="col">Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($noticias as $noticia)
                <tr>
                    <td style="width: 200px">
                        <a  href="/noticias/{{$noticia->id}}/edit"
                            class="btn btn-primary btn-sm">Editar
                        </a>
                        <form   action="/noticias/{{ $noticia->id }}"
                                method="POST"
                                class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
    <!--1 -->       <td>{{$noticia->titulo}}</td> 
    <!--2 -->       <td>{{$noticia->conteudo}}</td>
        
    <!--3 -->       <td>{{ $noticia->status_formatado }}</td>
    <!--4 -->       <td>{{ optional($noticia->data_publicacao)->format("d/m/Y") }}</td>




    <!--5 -->       <td>
                        <img src="{{$noticia->imagem}}" alt="" height="50px">   
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $noticias->links() }}
<div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>

</div>
@stop
