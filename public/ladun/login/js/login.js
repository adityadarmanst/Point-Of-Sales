$(document).ready(function(){

    var capNotif = $('#capNotifLogin');
    capNotif.hide();

    $('#btnMasuk').click(function(){
        var username = $('#txtUsername').val();
        var password = $('#txtPassword').val();

        if(username === '' && password === ''){
            capNotif.removeClass('alert-success').addClass('alert-warning');
            capNotif.html('Harap periksa field!!');
            capNotif.show();
            setTimeout(tutupCapNotif, 2000);
        }else{

        }
        
    });

    function tutupCapNotif(){
        capNotif.hide();
    }

});