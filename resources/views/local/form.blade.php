@extends('adminlte::page')

@section('content')
    
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Local</h3><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/local">Local Home</a></li>
                        <li class="breadcrumb-item active">Cadastrar</li>
                    </ol>
                </div>
            </div>

            <form action="submit" method="POST">
            @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Nome do Local</label>
                        <input type="text" class="form-control" name="nome_local" placeholder="Descreva o nome do Local">
                    </div>

                    <div class="form-group">
                        <label>Número do Local</label>
                        <input type="text" class="form-control" placeholder="Descreva o nome do Local">
                    </div>

                    <div class="form-group">
                        <label>Telefone do Local</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15" placeholder="Descreva o telefone do Local">
                    </div>

                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" class="form-control" name="CEP" id="cep" placeholder="Descreva o nome do Local" onblur="pesquisacep(this.value);">
                    </div>

                    <div class="form-group">
                        <label>Rua</label>
                        <input type="text" class="form-control" name="rua" id="rua">
                    </div>

                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro">
                    </div>

                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade">
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" class="form-control" name="estado" id="uf">
                        <input name="ibge" type="hidden" id="ibge" size="8">
                    </div>
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('js')
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
    <script>

        function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }

        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }

        function mtel(v){
            v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }

        function id( el ){
            return document.getElementById( el );
        }

        window.onload = function(){
            id('telefone').onkeypress = function(){
                mascara( this, mtel );
            }
        }
        
    </script>
@endsection