$(document).ready(function (){
	$(".search").click(function(){
		realizaProceso($(this).find("h3").html()); 
                /*$(".result").scrollTop(10);*/
                return false; 
	});

});

function realizaProceso(tipoejercicios){
        var parametros = {
                "titulo" : tipoejercicios
        };
        $.ajax({
                data:  parametros,
                url:   '/fiamma/miweb/wp-content/themes/intuition/core/ajax-search.php',
                type:  'post',
                beforeSend: function () {
                        $(".result").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                	
                        $(".result").html(response);
                }
        });
}