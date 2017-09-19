
    <div class="main-panel">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Team Management</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <div class="top">

                            </div>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Team Name</th>
                                            <th>Team University</th>
                                            <th>Leader Name</th>
                                            <th>Leader ID</th>
                                            <th>Leader Email</th>
                                            <th>Leader Phone Num</th>
                                            <th>Team Member 1</th>
                                            <th>Team Member 2</th>
                                            <th>Team Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($teams as $team_item):?>
                                        <tr>
                                            <td><?php echo $team_item->team_name;?></td>
                                            <td><?php echo $team_item->team_university;?></td>
                                            <td><?php echo $team_item->team_leader;?></td>
                                            <td><?php echo $team_item->team_leader_id;?></td>
                                            <td><?php echo $team_item->team_leader_email;?></td>
                                            <td><?php echo $team_item->team_leader_msisdn;?></td>
                                            <td><?php echo $team_item->team_member1;?></td>
                                            <td><?php echo $team_item->team_member2;?></td>
                                            <td><?php echo $team_item->team_type;?></td>
                                            <td><?php echo $team_item->team_status;?></td>
                                            <td>
                                                <a href="#" onclick="modal_get_data_team(<?php echo $team_item->pk_team;?>)">EDIT</a>
                                                 <a href="#" onclick="delete_data_team(<?php echo $team_item->pk_team;?>)">DELETE</a>
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
        <h3 class="modal-title">Team Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <div class="form-body">

          <div class="form-group">
              <label class="control-label col-md-3">PK Team</label>
                  <div class="col-md-9">
                    <input name="pk_team" placeholder="PK" class="form-control" type="text" disabled>
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Team Name</label>
                  <div class="col-md-9">
                    <input name="team_name" placeholder="team Name" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Team University</label>
                  <div class="col-md-9">
                    <input name="team_university" placeholder="team University" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">team Leader</label>
                  <div class="col-md-9">
                    <input name="team_leader" placeholder="team leader" class="form-control" type="text">
                  </div>
            </div>

           <div class="form-group">
              <label class="control-label col-md-3">team Leader ID</label>
                  <div class="col-md-9">
                    <input name="team_leader_id" placeholder="team leader id" class="form-control" type="text">
                  </div>
            </div>

           <div class="form-group">
              <label class="control-label col-md-3">team Leader Email</label>
                  <div class="col-md-9">
                    <input name="team_leader_email" placeholder="team leader id" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">team leader MSISDN</label>
                  <div class="col-md-9">
                    <input name="team_leader_msisdn" placeholder="team leader MSISDN" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">team Member 1</label>
                  <div class="col-md-9">
                    <input name="team_member1" placeholder="team leader MSISDN" class="form-control" type="text">
                  </div>
            </div>

          <div class="form-group">
              <label class="control-label col-md-3">team member 2</label>
                  <div class="col-md-9">
                    <input name="team_member2" placeholder="team leader MSISDN" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Team Type</label>
                  <div class="col-md-9">
                    <input name="team_type" placeholder="Competition Type" class="form-control" type="text">
                  </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
                  <div class="col-md-9">
                    <input name="team_password" placeholder="*******" class="form-control" type="password">
                  </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3">Status</label>
                  <div class="col-md-9">
                    <input name="team_status" placeholder="Status" class="form-control" type="text">
                  </div>
            </div>

          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="modal_save_data_team()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
