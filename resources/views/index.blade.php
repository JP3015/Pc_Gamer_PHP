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
            <h1>Cadastro de peças para computadores</h1>
    </header>
    <body>
        <div>
            <div>
                <form class="post-content" action="{{ route('pc_gamer.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label><b>Tipo:</b></label>
                    <select name="tipo">
                        <option value="placaVideo">Placa de vídeo</option>
                        <option value="processador">Processador</option>
                        <option value="placaMae">Placa mãe</option>
                        <option value="fonte">Fonte</option>
                    </select>
                    <label><b>Modelo:</b></label>
                    <input type="text" name="modelo" placeholder="digite aqui" class="content-input"/>
                    <label><b>Preço:</b></label>
                    <input type="number" name="preco" placeholder="digite aqui" class="content-input"/>
                    <label><b>Foto:</b></label>
                    <input type="file" id="input_imagem" name="foto"/>
                    <br>
                    <div id="exibir_imagem"></div>
                    <br>
                    <button class="submit-btn">Enviar</button>
                </form>
            </div>
            <h2 class="sub-title"><b>Cadastrados:</b></h2>
            <div class="get-content">
                <table>
                    <thead>
                        <tr>
                            <th class="get-topic">Tipo</th>
                            <th class="get-topic">Modelo</th>
                            <th class="get-topic">Preço</th>
                            <th class="get-topic">Foto</th>
                            <th class="get-topic">Editar</th>
                            <th class="get-topic">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pcGamers as $pcGamer)
                        <tr>
                            <td class="get-text">{{ $pcGamer->tipo }}</td>
                            <td class="get-text">{{ $pcGamer->modelo }}</td>
                            <td class="get-text">{{ $pcGamer->preco }}</td>
                            <td class="get-text">
                                <img src="{{ asset('/storage/images/' . $pcGamer->foto) }}" width="100" height="100">
                            </td>
                            <td class="get-text">
                                <a href="{{ route('pc_gamer.edit', $pcGamer->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td class="get-text">
                                <form action="{{ route('pc_gamer.destroy', $pcGamer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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