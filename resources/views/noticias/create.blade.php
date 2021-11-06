<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Notícias</title>
    <style>
        body .container{
            color: blue;
        }

        body .container h4{
            color: blue;
            background-color: yellow;
            text-align: center;
        
        }
        .logo { !important
            display: block;
            background-color: #002f59;
            text-align: center; 

        }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container pt-5">
        <div class="logo">
            <img src="/img/flex.jpeg",>
        </div>
        
        <h4>=> Cadastro de Notícias <=</h4>
        
       
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
        
        <form action="/noticias" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input  type="text" 
                        name="titulo" 
                        placeholder="Digite o título da notícia" 
                        class="form-control">
            </div>

            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea   name="conteudo"
                            placeholder="Digite o conteúdo da notícia" 
                            rows="5" 
                            class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem Destaque</label><br>
                <input type="file" name="imagem">
            </div>

            <div class="form-group">
                <label for="status">Status</label><br>
                <select name="status" class="form-control">
                    <option value="A">Ativo</option>
                    <option value="I">Inativo</option>
                </select>
            </div>
 
            <div class="form-group">
                <label for="data_publicacao">Data Publicacao</label><br>
                <input  type="text" 
                        name="data_publicacao" 
                        class="form-control" 
                        data-provide="datepicker" 
                        data-date-format="dd/mm/yyyy" 
                        data-date-language="pt-BR"
                        >
            </div>

            <button type="submit" 
                    class="btn btn-primary">Salvar</button>

            <a href="/noticias" class="btn btn-secondary">Voltar</a>

        </form>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>