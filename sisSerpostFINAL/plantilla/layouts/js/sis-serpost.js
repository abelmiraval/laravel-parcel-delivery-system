function cargarlistado(listado){

    //funcion para cargar los diferentes  en general

if(listado==1){ var url = "reportes"; }
$.get(url,function(resul){

        $("#contenido_principal").html(resul); 
})

}