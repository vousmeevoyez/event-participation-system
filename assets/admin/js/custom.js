id = '';
p_pk = '';
p_id = '';
p_name = '';
p_univ = '';
p_email = '';
p_msisdn = '';
p_type = '';
p_status = '';
p_password = '';

t_pk = '';
t_id = '';
t_name = '';
t_univ = '';
t_email = '';
t_msisdn = '';
t_type = '';
t_status = '';
t_password = '';

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
	p_pk = $('[name="pk_participant"]').val();
	p_id = $('[name="participant_id"]').val();
	p_name = $('[name="participant_name"]').val();
	p_univ = $('[name="participant_university"]').val();
	p_email = $('[name="participant_email"]').val();
	p_msisdn = $('[name="participant_msisdn"]').val();
	p_type = $('[name="participant_type"]').val();
	p_status = $('[name="participant_status"]').val();
	p_password = $('[name="participant_password"]').val();
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
		"/ci-hifest/participants/participant_get/" + id,
		{},
		true
	);
};

get_data_participant_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	data = msg_json.data;
	if (message == 'GET_PARTICIPANT_SUCCESS')
	{
		$('[name="pk_participant"]').val(data.pk_participant);
		$('[name="participant_id"]').val(data.participant_id);
		$('[name="participant_name"]').val(data.participant_name);
		$('[name="participant_university"]').val(data.participant_university);
		$('[name="participant_email"]').val(data.participant_email);
		$('[name="participant_msisdn"]').val(data.participant_msisdn);
		$('[name="participant_type"]').val(data.participant_type);
		$('[name="participant_status"]').val(data.participant_status);
		$('[name="participant_password"]').val(data.participant_password);


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
* 	 TEAM
*/
modal_save_data_team = function()
{
	get_form_input_team();
	update_data_team();
}

get_form_input_team = function()
{
	t_pk 			= $('[name="pk_team"]').val();
	t_name 			= $('[name="team_name"]').val();
	t_univ 			= $('[name="team_university"]').val();
	t_leader 		= $('[name="team_leader"]').val();
	t_leader_id 	= $('[name="team_leader_id"]').val();
	t_leader_email 	= $('[name="team_leader_email"]').val();
	t_leader_msisdn = $('[name="team_leader_msisdn"]').val();
	t_member1 		= $('[name="team_member1"]').val();
	t_member2 		= $('[name="team_member2"]').val();
	t_type 			= $('[name="team_type"]').val();
	t_status 		= $('[name="team_status"]').val();
	t_password 		= $('[name="team_password"]').val();
};

modal_get_data_team = function(id)
{
	get_data_team(id);
};

get_data_team = function(id)
{
	AJAX_SERVER(
		get_data_team_CALLBACK,
		"GET",
		"/ci-hifest/team/team_get/" + id,
		{},
		true
	);
};

get_data_team_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	data = msg_json.data;
	if (message == 'GET_TEAM_SUCCESS')
	{
		$('[name="pk_team"]').val(data.pk_team);
		$('[name="team_name"]').val(data.team_name);
		$('[name="team_university"]').val(data.team_university);
		$('[name="team_leader"]').val(data.team_leader);
		$('[name="team_leader_id"]').val(data.team_leader_id);
		$('[name="team_leader_email"]').val(data.team_leader_email);
		$('[name="team_leader_msisdn"]').val(data.team_leader_msisdn);
		$('[name="team_member1"]').val(data.team_member1);
		$('[name="team_member2"]').val(data.team_member2);
		$('[name="team_type"]').val(data.team_type);
		$('[name="team_status"]').val(data.team_status);
		$('[name="team_password"]').val(data.team_password);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit team'); // Set title to Bootstrap modal title
	}
};

update_data_team = function()
{
	AJAX_SERVER(
		update_data_team_CALLBACK,
		"POST",
		"/ci-hifest/team/team_update/",
		{
			pk_team 			: t_pk,
			team_name 			: t_name,
			team_university 	: t_univ,
			team_leader 		: t_leader,
			team_leader_id 		: t_leader_id,
			team_leader_email 	: t_leader_email,
			team_leader_msisdn 	: t_leader_msisdn,
			team_member1 		: t_member1,
			team_member2 		: t_member2,
			team_type 			: t_type,
			team_status 		: t_status,
			team_password 		: t_password
		}
	)
};

update_data_team_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	if(message == 'UPDATE_TEAM_SUCCESS')
	{
		swal("Update Success!", "Will Redirect", "success");
		location.reload();
	}
	else
	{
		swal("Update FAiled !", "Will Redirect!", "error");
	}
};

delete_data_team = function(id)
{
	AJAX_SERVER(
		delete_data_team_CALLBACK,
		"POST",
		"/ci-hifest/team/team_delete/" + id,
		{},
		true
	);
};

delete_data_team_CALLBACK = function(msg_json)
{
	message = msg_json.message;
	if(message == 'DELETE_TEAM_SUCCESS')
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
