$(document).ready(function(){
    $('.modal').modal();
    $('.parallax').parallax();
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({ hover: false });
    $('.parallax').parallax();
    $(".slider").slider();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    $('.datepicker').datepicker();
    $('.tabs').tabs();
    $('select').formSelect();
    $(".doctors").carousel({
        numVisible: 6,
        shift : 55,
        padding :20,
    });
});

function toggleModal(){
    var instance =M.Modal.getInstance($("#modal3"));
    instance.open();
}


function toggleModal_signup(){
    var instance =M.Modal.getInstance($("#modalSign"));
    instance.open();
}

function toggleModal_doctor(){
    var instance =M.Modal.getInstance($("#asdoc"));
    instance.open();
}
function toggleModal_confirm(){
    var instance =M.Modal.getInstance($("#confirm"));
    instance.open();
}
