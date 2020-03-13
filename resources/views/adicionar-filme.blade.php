<html>
    <head>
        <title>Adicionar Filme</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <h1 class="title"> Adicionar filme </h1>
        <form id="adicionarFilme" name="adicionarFilme" method="POST">
            @csrf <!--PARA DRIBLAR O ERRO DE 419 -->
            <div class="form-group">
                <label for="titulo">Título</label>
                <input class="form-control" type="text" name="title" id="titulo"/>
                <!-- PARA VALIDAR O ERRO -->
                @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="classificacao">Classificação</label>
                <input class="form-control" type="text" name="rating" id="classificacao"/>
                @error('rating')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="premios">Prêmios</label>
                <input class="form-control" type="text" name="awards" id="premios"/>
                @error('awards')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="duracao">Duração</label>
                <input class="form-control" type="text" name="length" id="duracao"/>
                @error('length')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group">
                <label>Data de estreia</label>
                <select class="form-control col-sm-4" name="dia">
                    <option value="">Dia</option>
                    <?php for ($i=1; $i < 32; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>         
                </select>
                <select class="form-control col-sm-4" name="mes">
                    <option value="">Mês</option>
                    <?php for ($i=1; $i < 13; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>                  
                </select>
                <select class="form-control col-sm-4" name="ano">
                    <option value="">Ano</option>
                    <?php for ($i=1900; $i < 2017; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    
                </select>
                @error('dia')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('mes')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                @error('ano')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gêneros</label>
                <select class="form-control" name="genre_id">
                    <option value="">Selecione um gênero</option>
                    @foreach ($genres as $genre)
                        <option value="{{$genre['id']}}">{{$genre['name']}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Adicionar Filme" name="submit"/>
        </form>
    </div>
    
</body>

</html>
