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
        <script>
            $(function () {
                $('.next-1').click(function (event) {
                    event.preventDefault();       
                    var v_name = $('#name').val();
                    var v_data_nasc = $('#data_nasc').val();
                    var v_email = $('#email').val();
                    var v_tel = $('#tel').val();
                    if(!(v_name != '' && v_tel != '' && v_email != '' && v_data_nasc != '')){
                        return false;
                    } else {
                        $(this).parents('.form-step').hide().next().show();
                    }
                });
                
                $('.next-2').click(function (event) {
                        event.preventDefault();
                        var v_reg = $('#reg').val();
                        var v_unid = $('#unid').val();
                        if(v_unid == null || v_reg == null || v_unid == 'Não possui disponibilidade'){
                            return false;
                        } else {
                            $(this).parents('.form-step').hide().next().show(); 
                        }
                });
                $(document).ready(function(){
                    $("#reg").change(function(){
                        if($("#reg").val() == 'Sul'){
                            $('#score').val('8');
                            $("#cu").css("display","block");
                            $("#pa").css("display","block");
                            $("#br").css("display","none");
                            $("#be").css("display","none");
                            $("#re").css("display","none");
                            $("#ri").css("display","none");
                            $("#sa").css("display","none");
                            $("#sp").css("display","none");
                            $("#not").css("display","none");
                        }if($("#reg").val() == 'Sudeste'){
                            $('#score').val('9');
                            $("#cu").css("display","none");
                            $("#pa").css("display","none");
                            $("#br").css("display","none");
                            $("#be").css("display","block");
                            $("#re").css("display","none");
                            $("#ri").css("display","block");
                            $("#sa").css("display","none");
                            $("#sp").css("display","block");
                            $("#not").css("display","none");
                        }if($("#reg").val() == 'Centro-Oeste'){
                            $('#score').val('7');
                            $("#cu").css("display","none");
                            $("#pa").css("display","none");
                            $("#br").css("display","block");
                            $("#be").css("display","none");
                            $("#re").css("display","none");
                            $("#ri").css("display","none");
                            $("#sa").css("display","none");
                            $("#sp").css("display","none");
                            $("#not").css("display","none");
                        }if($("#reg").val() == 'Nordeste'){
                            $('#score').val('6');
                            $("#cu").css("display","none");
                            $("#pa").css("display","none");
                            $("#br").css("display","none");
                            $("#be").css("display","none");
                            $("#re").css("display","block");
                            $("#ri").css("display","none");
                            $("#sa").css("display","block");
                            $("#sp").css("display","none");
                            $("#not").css("display","none");
                        }if($("#reg").val() == 'Norte'){
                            $('#score').val('5');
                            $("#cu").css("display","none");
                            $("#pa").css("display","none");
                            $("#br").css("display","none");
                            $("#be").css("display","none");
                            $("#re").css("display","none");
                            $("#ri").css("display","none");
                            $("#sa").css("display","none");
                            $("#sp").css("display","none");
                            $("#not").css("display","block");
                        }
                    });
                });
                $('.send').click(function (event) {
                    event.preventDefault();

                    var v_name = $('#name').val();
                    var v_data_nasc = $('#data_nasc').val();
                    var v_email = $('#email').val();
                    var v_tel = $('#tel').val();
                    var v_reg = $('#reg').val();
                    var v_unid = $('#unid').val();
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
                    if(nameTrim != null && v_tel != null && v_email != null && date_nasc_form != null && v_reg != null && v_unid != null && v_unid != 'Não possui disponibilidade'){
                        if(nameValid && telValid >= 10 && telValid <= 11 && emailValid && dataValid == 2){
                            var validate = true;
                        } else {
                            var validate = false;
                        }
                    } else {
                        var validate = false;
                    }
                    if(v_unid == null || v_reg == null || v_unid == 'Não possui disponibilidade'){
                        return false;
                    }
                    function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
                        var d = new Date,
                            ano_atual = d.getFullYear(),
                            mes_atual = d.getMonth() + 1,
                            dia_atual = d.getDate(),
                            ano_aniversario = +ano_aniversario,
                            mes_aniversario = +mes_aniversario,
                            dia_aniversario = +dia_aniversario,
                            quantos_anos = ano_atual - ano_aniversario;
                        if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
                            quantos_anos--;
                        }
                        return quantos_anos < 0 ? 0 : quantos_anos;
                    }
                    var idade = idade(ano_nasc = date_nasc_form.slice(6, 11), mes_nasc = date_nasc_form.slice(3, 5), dia_nasc = date_nasc_form.slice(0, 2));
                    var score = $('#score').val();
                    if(idade >= 100 || idade < 18){
                        $('#score').val($('#score').val() - 5);
                    }if(idade >= 40 && idade <= 99){
                        $('#score').val($('#score').val() - 3);
                    }
                    var v_score = $('#score').val();

                    if (validate) {
                        console.log('entrou');
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
                    }
                });
            });
        </script>
    </body>
</html>