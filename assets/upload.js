$(document).ready(function(){
    $('#btnFoto').click(function(){

      $.ajax({
        url: url,
        data: foto_usuario,
        cache: false,
        contentType: false,
        processData: false,
        type: "POST",
        success: function(response){
        }
      });
    });
  });