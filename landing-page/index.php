<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compre Já</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin:30px 0">
                <div class="col-lg-3">
                    <img src="img/logo.png" class="img-thumbnail">
                </div>
                <div class="col-lg-9">
                    <h3>Nome do Produto</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6" id="form-container">

                    <form id="step_1" class="form-step">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Preencha seus dados para receber contato
                                </div>
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>Nome Completo</label>
                                            <input class="form-control" type="text" id="name" name="nome" placeholder="Insira seu nome">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Data de Nascimento</label>
                                            <input class="form-control" type="date" id="data_nasc" name="data_nascimento">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>Email</label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="exemplo.ex@hotmail.com">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Telefone</label>
                                            <input class="form-control" type="tel" id="tel" name="telefone" placeholder="(11)9 9999-9999">
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" form="step_1" value="Próximo Passo" class="btn btn-lg btn-info next-1 next-step"></input>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>

                    <form id="step_2" class="form-step" style="display:none">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Preencha seus dados para receber contato
                                </div>
                            </div>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label>Região</label>
                                            <select class="form-control" name="regiao" id="reg">
                                                <option selected disabled>Selecione a sua região</option>
                                                <option id="Sul" value="Sul">Sul</option>
                                                <option id="Sudeste" value="Sudeste">Sudeste</option>
                                                <option id="Centro-Oeste" value="Centro-Oeste">Centro-Oeste</option>
                                                <option id="Nordeste" value="Nordeste">Nordeste</option>
                                                <option id="Norte" value="Norte">Norte</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="score" value="10">
                                        <div class="col-lg-6">
                                            <label>Unidade</label>
                                            <select class="form-control" name="unidade" id="unid">
                                                <option selected disabled>Selecione a unidade mais próxima</option>
                                                <option id="be" style="display:none">Belo Horizonte</option>
                                                <option id="br" style="display:none">Brasília</option>
                                                <option id="cu" style="display:none">Curitiba</option>
                                                <option id="pa" style="display:none">Porto Alegre</option>
                                                <option id="re" style="display:none">Recife</option>
                                                <option id="ri" style="display:none">Rio de Janeiro</option>
                                                <option id="sa" style="display:none">Salvador</option>
                                                <option id="sp" style="display:none">São Paulo</option>
                                                <option id="not" style="display:none">Não possui disponibilidade</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" form="step_2" value="Enviar" class="btn btn-lg btn-info next-step next-2 send"></input>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>

                    <div id="step_sucesso" class="form-step" style="display:none">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Obrigado pelo cadastro!
                                </div>
                            </div>
                            <div class="panel-body">
                                Em breve você receberá uma ligação com mais informações!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1>Chamada interessante para o produto</h1>
                    <h2>Mais uma informação relevante</h2>
                </div>
            </div>
        </div>
        <script src="./javascript.js"></script>
    </body>
</html>