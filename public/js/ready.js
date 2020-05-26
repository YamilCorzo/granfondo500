$(document).ready(function () {
    Inputmask({regex: "[0-9]*"}).mask(document.querySelectorAll('.telefono'));
    Inputmask({regex: "[0-9]*"}).mask(document.querySelectorAll('.celular'));
});
