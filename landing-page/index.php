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
                                        <input type="submit" form="step_1" value="Próximo Passo" class="btn btn-lg btn-info next-step"></input>
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
                                                <option value="">Selecione a sua região</option>
                                                <option>Sul</option>
                                                <option>Sudeste</option>
                                                <option>Centro-Oeste</option>
                                                <option>Nordeste</option>
                                                <option>Norte</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Unidade</label>
                                            <select class="form-control" name="unidade" id="unid">
                                                <option value="">Selecione a unidade mais próxima</option>
                                                <option>???</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <input type="submit" form="step_2" value="Enviar" class="btn btn-lg btn-info next-step send"></input>
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
        <script>
            $(function () {
                $('.next-step').click(function (event) {
                    event.preventDefault();
                    $(this).parents('.form-step').hide().next().show();
                });
                $('.send').click(function (event) {
                    event.preventDefault();

                    var v_name = $('#name').val();
                    var v_data_nasc = $('#data_nasc').val();
                    var v_email = $('#email').val();
                    var v_tel = $('#tel').val();
                    var v_reg = $('#reg').val();
                    var v_unid = $('#unid').val();

                    var v_score = 1;


                    const date = new Date(v_data_nasc);                 
                    const formatter = Intl.DateTimeFormat('pt-BR', {
                        dateStyle: "short"
                    });
                    var date_nasc_form = formatter.format(date);
                    var nameTrim = v_name.trim();
                    var nameValid = nameTrim.includes(' ');
                    var telValid = v_tel.length;
                    var emailValid = v_email.includes('@');
                    var dataValid = (v_data_nasc.match(/-/g) || []).length;

                    if(nameTrim != null && v_tel != null && v_email != null <= 11 && date_nasc_form != null){// && v_reg != null && v_unid != null
                        if(nameValid && telValid >= 10 && telValid <= 11 && emailValid && dataValid == 2){
                            console.log('true');
                        }
                        console.log('false');
                    } else {
                        console.log('false');
                        //retornar mensagem de que x campo ta errado
                    }

                    $.ajax({
                        url: 'http://as/fullstack-test/landing-page/functions.php',
                        method: 'POST',
                        data: {
                            nome: v_name,
                            email: v_email,
                            telefone: v_tel,
                            regiao: v_reg, 
                            unidade: v_unid,
                            data_nascimento: date_nasc_form,
                            score: v_score
                        },
                        dataType: 'json'
                    }).done(function(result){
                        console.log(result);
                    })
                });
            });
        </script>
    </body>
</html>