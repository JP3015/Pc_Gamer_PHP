<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pc Gamer</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
                        <option value="Placa de Video">Placa de vídeo</option>
                        <option value="Processador">Processador</option>
                        <option value="Placa Mae">Placa mãe</option>
                        <option value="Fonte">Fonte</option>
                    </select>
                    <label><b>Modelo:</b></label>
                    <input type="text" name="modelo" placeholder="digite aqui" class="content-input"/>
                    <label><b>Preço:</b></label>
                    <input type="text" id="preco" name="preco" placeholder="digite aqui" class="content-input"/>
                    <label><b>Foto:</b></label>
                    <input type="file" id="input_imagem" name="foto"/>
                    <br>
                    <div id="exibir_imagem"></div>
                    <br>
                    <button id="botao" class="submit-btn">Enviar</button>
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
                            <td id="precos" class="get-text">R$ {{ number_format($pcGamer->preco, 2, ',', '.') }}</td>
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
    
    var removePrefixButton = document.getElementById('botao');

    removePrefixButton.addEventListener('click', function(e) {
        preco.value = removePrefix(preco.value, 'R$ ');
    });

    var preco = document.getElementById('preco');
    preco.addEventListener('input', function(e)
    {
        preco.value = formatRupiah(this.value, 'R$ ');
    });

    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'R$ ' + rupiah : '');
    }
    
    function removePrefix(value, prefix) {
        return value.replace(prefix, '');
    }

</script>
