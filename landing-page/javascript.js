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
        var date_nasc_form = formatter.format(date); // para a api
        var nameTrim = v_name.trim();
        var nameValid = nameTrim.includes(' ');
        var telValid = v_tel.length;
        var emailValid = v_email.includes('@');
        var dataValid = (v_data_nasc.match(/-/g) || []).length;

        if(nameTrim != null && v_tel != null && v_email != null && v_data_nasc != null && v_reg != null && v_unid != null && v_unid != 'Não possui disponibilidade'){
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
        var v_idade = idade(ano_nasc = date_nasc_form.slice(6, 11), mes_nasc = date_nasc_form.slice(3, 5), dia_nasc = date_nasc_form.slice(0, 2));
        var score = $('#score').val();
        if(v_idade >= 100 || v_idade < 18){
            $('#score').val($('#score').val() - 5);
        }if(v_idade >= 40 && v_idade <= 99){
            $('#score').val($('#score').val() - 3);
        }
        var v_score = $('#score').val();

        nameFormated = nameTrim.toLowerCase().replace(/(?:^|\s)\S/g, function(a) {
            return a.toUpperCase();
        });

        if (validate) {
            console.log('entrou');
            $.ajax({
            url: 'http://as/fullstack-test/landing-page/functions.php',
            method: 'POST',
            data: {
                nome: nameFormated,
                email: v_email,
                telefone: v_tel,
                regiao: v_reg, 
                unidade: v_unid,
                data_nascimento: v_data_nasc,
                score: v_score,
                idade: v_idade
            },
            dataType: 'json'
            }).done(function(result){
                console.log(result);
            })
        }
    });
});                                                                                                                                                                                            