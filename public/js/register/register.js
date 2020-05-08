$(function(){
    $(document).on('click', '#register_submit_btn', function(){
        const token = $("#token").val();
        const reg_name = $("#name").val();
        const reg_email = $("#email").val();
        const reg_password = $("#password").val();
        const reg_cmf_password = $("#cmf_password").val();
        $.ajax({
            type: 'post',
            url: '/sent_register_data',
            data: {"_token": token, reg_name, reg_email, reg_password, reg_cmf_password},
            success: function(r){
                $("#err_name").html('');
                $("#err_email").html('');
                $("#err_password").html('');
                $("#err_cmf_password").html('');
                $("#contactForm input").css({
                    "border-color": '#CCCCCC',
                });
                if(r['error']){
                    if(r['error'].hasOwnProperty('reg_name')){
                        $("#err_name").html("*"+r['error']['reg_name'][0]);
                        $("#err_name").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_name").css({
                            "color": "red",
                        })
                    }

                    if(r['error'].hasOwnProperty('reg_email')){
                        $("#err_email").html("*"+r['error']['reg_email'][0]);
                        $("#err_email").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_email").css({
                            "color": "red",
                        })
                    }

                    if(r['error'].hasOwnProperty('reg_password')){
                        $("#err_password").html("*"+r['error']['reg_password'][0]);
                        $("#err_password").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_password").css({
                            "color": "red",
                        })
                    }

                    if(r['error'].hasOwnProperty('reg_cmf_password')){
                        $("#err_cmf_password").html("*"+r['error']['reg_cmf_password'][0]);
                        $("#err_cmf_password").prev().css({
                            "border-color": 'red',
                        });
                        $("#err_cmf_password").css({
                            "color": "red",
                        })
                    }
                }
                else{
                    location.href = "/login";
                }
            },
            error: function(){
                alert("ERROR_REGISTER");
            }
        })
    })
});
