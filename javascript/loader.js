$(document).ready(function(){
    $('.modal').modal();
    $('.parallax').parallax();
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({ hover: false });
    $('.parallax').parallax();
    $(".slider").slider();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    $('.datepicker').datepicker({
        format:'yyyy-mm-dd'
      });
    
    $('.tabs').tabs();
    $('.timepicker').timepicker({twelveHour:false});
    $('select').formSelect();
    $(".doctors").carousel({
        numVisible: 6,
        shift : 55,
        padding :20,
    });
    $('.materialboxed').materialbox();
});


function toggleModal_signup(){
    var instance =M.Modal.getInstance($("#modalSign"));
    instance.open();
}
function toggleModal_doctor(){
    var instance =M.Modal.getInstance($("#asdoc"));
    instance.open();
}

function toggleModal_login(){
    var instance =M.Modal.getInstance($("#loginF"));
    instance.open();
}
function toggleModal_patient(){
    var instance =M.Modal.getInstance($("#aspat"));
    instance.open();
}
function goBack() {
    window.history.back();}

   
