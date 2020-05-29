@extends('adminlte::page')

@section('content_header')
<h1>Local</h1>
@endsection

@section('content')
    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    <form action="submit" method="POST">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label>Nome do Local</label>
                <input type="text" class="form-control" name="nome_local" placeholder="Descreva o nome do Local">
            </div>

            <div class="form-group">
                <label>Número do Local</label>
                <input type="text" class="form-control" name="nome_local" placeholder="Descreva o nome do Local">
            </div>

            <div class="form-group">
                <label>CEP</label>
                <input type="text" class="form-control" name="CEP" id="cep" placeholder="Descreva o nome do Local" onblur="pesquisacep(this.value);">
            </div>

            <div class="form-group">
                <label>Rua</label>
                <input type="text" class="form-control" name="rua_local" id="rua">
            </div>

            <div class="form-group">
                <label>Bairro</label>
                <input type="text" class="form-control" name="bairro_local" id="bairro">
            </div>

            <div class="form-group">
                <label>Cidade</label>
                <input type="text" class="form-control" name="cidade_local" id="cidade">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <input type="text" class="form-control" name="rua_local" id="uf">
                <input name="ibge" type="hidden" id="ibge" size="8">
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>

@endsection
