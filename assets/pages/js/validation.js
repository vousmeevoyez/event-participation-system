var name = '';
var email = '';
var password = '';

$(document).ready(function(){

	$('#regist-individual').click(function(){
		var alphabet = /^[a-zA-Z\s]*$/;
	    var msisdn_pattern = /^[0-9]{1,12}$/;
	    var email_pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

	    name = $('[name=user_name]').val();
	    email = $('[name=user_email]').val();
	    password = $('[name=user_password]').val();

		$('[name=user_name]').change(function() {
			$('#span-error-name').text("");
	    });

	    $('[name=user_email]').change(function() {
	        $('#span-error-email').text("");
	    });

	    $('[name=user_password]').change(function() {
	        $('#span-error-password').text("");
	    });

	    if(name.length != 0 || email.length != 0 || password.length != 0 ){

	        var valid = true;

	        if(name.match(alphabet) == null ){
	            $('#span-error-name').text("Please enter valid name");
	            valid = false;
	        }
	        if(email.match(email_pattern) == null ){
	            $('#span-error-email').text("Please enter valid email");
	            valid = false;
	        }

	        if( password.length < 6 ){
	            $('#span-error-password').text("Password can't be less than 6 Character");
	            valid = false;
	        }
	        
	        if(valid == true){
	        	console.log(name + ',' + email);
	            add_user();
	        }
	   }else{
	        $('#form-alert').html("<p class='form-alert'>Please Fill Form Below to Submit</p>");
	   }

	});
});

	

add_user = function()
{
	AJAX_SERVER(
		add_user_CALLBACK,
		"POST",
		"/ci-hifest/participant/add",
		{
			user_name 		: name,
			user_email 		: email,
			user_password 	: password,
		},
		true
	);
};

add_user_CALLBACK = function(msg_json)
{
	console.log(msg_json);
	message = msg_json.message;
	if (message == "ADD_USER_SUCCESS"){
		swal("Register Success!", "Please Continue Registration!", "success");
		window.location.replace ("http://localhost/ci-hifest/pages/view/login");
	}
	else{
		alert('ERROR');
	}
}


AJAX_SERVER = function(callback_func, method, wservice, uri, bool)
{
        var jqxhr = $.ajax(
        {
                url      : wservice ,
                method   : method   ,
                data     : uri      ,
                dataType : "json"
        }).done(
                function(msg_json)
                {
                        callback_func(msg_json);
                }
        ).fail(
                function(msg_json)
                {
                        callback_func(msg_json);
                }
        ).always(
                function()
                {
                }
        );
}


