$(document).ready(function(){

    $(this).on("click","#btnLogin",function(){
        $.post("logar.php",{
            login: $("#login").val(),
            senha: $("#senha").val()
        },function(val){

            if(val != 'null'){
                val = JSON.parse(val)[0];
                window.location.href = "cliente.php?codigo="+val['CODIGO'];
            }else alert("Login Inválido");
            
        });
    });
    
});