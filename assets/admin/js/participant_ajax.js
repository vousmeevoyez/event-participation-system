p_pk = '';
p_id = '';
p_name = '';
p_univ = '';
p_email = '';
p_msisdn = '';
p_type = '';
p_status = '';
p_password = '';

$(document).ready(function(){

});
/*
	PARTICIPANT AJAX
*/
modal_save_data_participant = function()
{
	get_form_input_participant();
	update_data_participant();
}

get_form_input_participant = function()
{
	p_pk 		= $('[name="pk_participant"]').val();
	p_name 		= $('[name="participant_name"]').val();
	p_email 	= $('[name="participant_email"]').val();
	p_univ 		= $('[name="participant_university"]').val();
	p_msisdn 	= $('[name="participant_msisdn"]').val();
	p_id 		= $('[name="participant_id"]').val();
	p_status 	= $('[name="participant_status"]').val();
};

modal_get_data_participant = function(id)
{
	get_data_participant(id);
};

get_data_participant = function(id)
{
	AJAX_SERVER(
		get_data_participant_CALLBACK,
		"GET",
		"/ci-hifest/admin/get_participant/" + id,
		{},
		true
	);
};

get_data_participant_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	data_participant = msg_json.data_participant;
	if (message == 'GET_PARTICIPANT_SUCCESS')
	{
		$('[name="pk_participant"]').val(data_participant.pk_participant);
		$('[name="participant_name"]').val(data_participant.participant_name);
		$('[name="participant_email"]').val(data_participant.data_participant);
		$('[name="participant_univ"]').val(data_participant.participant_univ);
		$('[name="participant_msisdn"]').val(data_participant.participant_msisdn);
		$('[name="participant_idcard"]').val(data_participant.participant_idcard);
		$('[name="participant_status"]').val(data_participant.participant_status);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit participant'); // Set title to Bootstrap modal title
	}
};

update_data_participant = function()
{
	AJAX_SERVER(
		update_data_participant_CALLBACK,
		"POST",
		"/ci-hifest/participants/participant_update/",
		{
			pk_participant 			: p_pk,
			participant_id 			: p_id,
			participant_name 		: p_name,
			participant_university 	: p_univ,
			participant_email 		: p_email,
			participant_msisdn 		: p_msisdn,
			participant_type 		: p_type,
			participant_status 		: p_status,
			password 				: p_password
		}
	)
};

update_data_participant_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	console.log(message);
	if(message == 'UPDATE_PARTICIPANT_SUCCESS')
	{
		swal("Update Success!", "Will Redirect", "success");
		location.reload();
	}
	else
	{
		swal("Update FAiled !", "Will Redirect!", "error");
	}
};

delete_data_participant = function(id)
{
	AJAX_SERVER(
		delete_data_participant_CALLBACK,
		"POST",
		"/ci-hifest/participants/participant_delete/" + id,
		{},
		true
	);
};

delete_data_participant_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	if(message == 'DELETE_PARTICIPANT_SUCCESS')
	{
		swal("Delete Success!", "Will Redirect", "success");
		location.reload();
	}
	else
	{
		swal("Delete failed !", "Will Redirect!", "error");
	}
};
/*
	END	PARTICIPANT AJAX
*/




/*
AJAX SERVER
*/

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
};
