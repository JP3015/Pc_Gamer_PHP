<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pc Gamer</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <header>
            <h1>Editar</h1>
    </header>
    <body>
        <div>
            <div>
                <form class="post-content" action="{{ route('pc_gamer.update', $pcGamer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label><b>Tipo:</b></label>
                    <select name="tipo">
                        <option value="placaVideo" @if($pcGamer->tipo == 'placaVideo') selected @endif>Placa de vídeo</option>
                        <option value="processador" @if($pcGamer->tipo == 'processador') selected @endif>Processador</option>
                        <option value="placaMae" @if($pcGamer->tipo == 'placaMae') selected @endif>Placa mãe</option>
                        <option value="fonte" @if($pcGamer->tipo == 'fonte') selected @endif>Fonte</option>
                    </select>
                    <label><b>Modelo:</b></label>
                    <input type="text" name="modelo" placeholder="digite aqui" value="{{ $pcGamer->modelo }}" class="content-input"/>
                    <label><b>Preço:</b></label>
                    <input type="number" name="preco" placeholder="digite aqui" value="{{ $pcGamer->preco }}" class="content-input"/>
                    <label><b>Foto:</b></label>
                    <input type="file" id="input_imagem" name="foto"/>
                    <br>
                    <div id="exibir_imagem"><img src="{{ asset('/storage/images/' . $pcGamer->foto) }}"  width="200" height="200"></div>
                    <br>
                    <button class="submit-btn">Atualizar</button>
                </form>
            </div>
        </div>
    </body>
    <footer>
        <p>Todos os direitos reservados - 2023@</p>
    </footer>
</html>
<script>
    $(document).ready(function() {
        $("#input_imagem").change(function() {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#exibir_imagem").html("<img src='" + e.target.result + "' width='200' height='200'>");
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>