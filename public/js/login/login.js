$(function(){
    $(document).on('click', '#login_submit_btn', function(){
        const token = $("#token").val();
        const login_email = $("#email").val();
        const login_password = $("#password").val();
        $.ajax({
            type: 'post',
            url: '/user_login',
            data: {"_token": token, login_email, login_password},
            success: function(r){
                $("#err_login_email").html('');
                $("#err_login_password").html('');
                $("#contactForm input").css({
                    "border-color": '#CCCCCC',
                });
                if(r['error']){
                    if(r['error'].hasOwnProperty('login_email')){
                        $("#err_login_email").html("*"+r['error']['login_email'][0]);
                        $("#err_login_email").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_login_email").css({
                            "color": "red",
                        })
                    }
                    if(r['error'].hasOwnProperty('login_password')){
                        $("#err_login_password").html("*"+r['error']['login_password'][0]);
                        $("#err_login_password").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_login_password").css({
                            "color": "red",
                        })
                    }
                }
                else{

                }
            },
            error: function(){
                alert("ERROR_LOGIN");
            }
        })
    });
});
