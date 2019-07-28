$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var capNotif = $('#capNotifLogin');
    capNotif.hide();

    $('#btnMasuk').click(function(){
        var username = $('#txtUsername').val();
        var password = $('#txtPassword').val();

        if(username === '' || password === ''){
            capNotif.removeClass('alert-danger');
            capNotif.removeClass('alert-success').addClass('alert-warning');
            capNotif.html('Harap periksa field!!');
            capNotif.show();
            setTimeout(tutupCapNotif, 2000);
        }else{
            $.post('/prosesLogin',{'username':username,'password':password}, function(data){
                
                var statusLogin = data.statusLogin;

                if(statusLogin === 'fail'){
                    capNotif.removeClass('alert-warning');
                    capNotif.removeClass('alert-success').addClass('alert-danger');
                    capNotif.html('Username / password salah!!');
                    capNotif.show();
                    setTimeout(tutupCapNotif, 2000);
                }else{
                   window.location.assign('/dashboard');
                }

            });
        }
        
    });

    function tutupCapNotif(){
        capNotif.hide();
    }

});