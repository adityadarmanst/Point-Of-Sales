$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var capNotif = $('#capNotifLogin');
    capNotif.hide();

    $('#btnMasuk').click(function(){
        let username = $('#txtUsername').val();
        let password = $('#txtPassword').val();

        if(username === '' || password === ''){
            capNotif.removeClass('alert-danger');
            capNotif.removeClass('alert-success').addClass('alert-warning');
            capNotif.html('Harap periksa field!!');
            capNotif.show();
            setTimeout(tutupCapNotif, 2000);
        }else{
            $.post('/prosesLogin',{'username':username,'password':password}, function(data){

                let statusLogin = data.statusLogin;
                console.log(data);
                if(statusLogin === 'no_username'){
                    capNotif.removeClass('alert-warning');
                    capNotif.removeClass('alert-success').addClass('alert-danger');
                    capNotif.html('Username tidak ditemukan!!');
                    capNotif.show();
                    setTimeout(tutupCapNotif, 2000);
                }else if(statusLogin === 'fail_password'){
                    capNotif.removeClass('alert-warning');
                    capNotif.removeClass('alert-success').addClass('alert-danger');
                    capNotif.html('Username / Password salah!!');
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
