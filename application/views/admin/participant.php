

    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Participant Management</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <div class="top">

                            </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>UNIVERSITY</th>
                                            <th>EMAIL</th>
                                            <th>PHONE NUM</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($participants as $participant):?>
                                        <tr>
                                            <td><?php echo $participant->participant_id;?></td>
                                            <td><?php echo $participant->participant_name;?></td>
                                            <td><?php echo $participant->participant_university;?></td>
                                            <td><?php echo $participant->participant_email;?></td>
                                            <td><?php echo $participant->participant_msisdn;?></td>
                                            <td><?php echo $participant->participant_type;?></td>
                                            <td><?php echo $participant->participant_status;?></td>
                                            <td>
                                                <a href="#" onclick="modal_get_data_participant(<?php echo $participant->pk_participant;?>)">EDIT</a>
                                                 <a href="#" onclick="delete_data_participant(<?php echo $participant->pk_participant;?>)">DELETE</a>
                                            </td>

                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Participant Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">PK Participant</label>
                  <div class="col-md-9">
                    <input name="pk_participant" placeholder="PK" class="form-control" type="text" disabled>
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Participant ID</label>
                  <div class="col-md-9">
                    <input name="participant_id" placeholder="Participant ID" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Participant Name</label>
                  <div class="col-md-9">
                    <input name="participant_name" placeholder="Participant Name" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Participant University</label>
                  <div class="col-md-9">
                    <input name="participant_university" placeholder="Participant University" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Participant Email</label>
                  <div class="col-md-9">
                    <input name="participant_email" placeholder="Participant Email" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Participant MSISDN</label>
                  <div class="col-md-9">
                    <input name="participant_msisdn" placeholder="Participant MSISDN" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Competition Type</label>
                  <div class="col-md-9">
                    <input name="participant_type" placeholder="Competition Type" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
                  <div class="col-md-9">
                    <input name="participant_password" placeholder="*******" class="form-control" type="password">
                  </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3">Status</label>
                  <div class="col-md-9">
                    <input name="participant_status" placeholder="Status" class="form-control" type="text">
                  </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="modal_save_data_participant()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->