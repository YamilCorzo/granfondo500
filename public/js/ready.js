$(document).ready(function () {
    Inputmask({regex: "[0-9]*"}).mask(document.querySelectorAll('.telefono'));
    Inputmask({regex: "[0-9]*"}).mask(document.querySelectorAll('.celular'));
    $("#conf_correo").bind({
        paste : function(e){
            e.preventDefault();
        }
    });
});
