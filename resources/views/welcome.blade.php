<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pc Gamer</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <header>
            <h1>Cadastro de peças para computadores</h1>
    </header>
    <body>
        <div>
            <div class="post-content">
                <label><b>Tipo:</b></label>
                <select>
                    <option value="placaVideo">Placa de vídeo</option>
                    <option value="processador">Processador</option>
                    <option value="placaMae">Placa mãe</option>
                    <option value="fonte">Fonte</option>
                </select>
                <label><b>Modelo:</b></label>
                <input type="text" placeholder="digite aqui" class="content-input"/>
                <label><b>Preço:</b></label>
                <input type="number" placeholder="digite aqui" class="content-input"/>
                <label><b>Foto:</b></label>
                <form>
                    <input type="file" id="input_imagem">
                </form>
                <br>
                <div id="exibir_imagem"></div>
                <br>
                <button class="submit-btn">Enviar</button>
            </div>
            <div class="get-content">
                <h2><b>Cadastrados:</b></h2>
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