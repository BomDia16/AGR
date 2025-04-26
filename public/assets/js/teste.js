$(document).ready(function(){
    M.AutoInit();

    $('.dropdown-trigger').dropdown({
        alignment: 'right',
        coverTrigger: false,
        constrainWidth: false
    });

    $('#preco').mask('000.000.000.000.000,00', {reverse: true});
});