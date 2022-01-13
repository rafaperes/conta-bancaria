require('./bootstrap');

//mask js
$('.money').mask('000.000.000.000.000,00', {
    reverse: true
});

$('.cpf').mask('000.000.000-00', {
    reverse: true
});