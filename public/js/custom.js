function submitAjax(btn,btnval,  datas, url, redir, msg) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    btn.addClass('is-loading');
    btn.html('Processing');
    //
    $.ajax({
        url: url,
        type: "POST",
        data: datas,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.success){
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.success(data.message, 'Success !');
                btn.removeClass('is-loading');
                btn.html(btnval);
                setTimeout(
                    function () {
                        if (redir !='') { location.href = redir; }
                        else { location.reload()}
                    }, 3000);
            }else{
                toastr.options.positionClass = 'toast-bottom-right';
                toastr.error(data.message, 'Error !');
                btn.removeClass('is-loading');
                btn.html(btnval);
            }
        },
        error : function(data){
            var response = JSON.parse(data.responseText);
            //
            printErrorMsg(response.errors);
            //
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error(response.message, 'Error !');
            btn.removeClass('is-loading').html(btnval);
        }
    });
}

$(document).off('click', '.confirmation').on('click', '.confirmation', function () {
    return confirm('Are you sure you want to perform this action ?');
});
//login js
$("#loginAction").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#loginBtn"), "Login", datas, '/login/doLogin', "access", $("#msg"));
}));


 // Register JS
 $("#registerFormCampus").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-registercampus"), "Register", datas, '/post-register-campus', 'sign-in-to-start-your-session', $("#msg"));
}));

