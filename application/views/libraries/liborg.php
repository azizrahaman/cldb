<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Libraries
        <small>Organization</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Libraries</a></li>
        <li class="active">Organization</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


<!-- CRUD TEST START -->
        <div class="row">
          <div class="col-md-12">


                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Organizaions</h3>
                      <button class="btn btn-primary pull-right add_org_btn">Add Organizaion</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                      <table class="table table-striped table-bordered librarytabletest" id="orgDataTable">
                        <thead>
                          <tr>
                            <th style="width: 10px;text-align:center">#</th>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Address</th>
                            <th style="width: 90px;text-align:center">Details</th>
                            <th style="width: 90px;text-align:center">Action</th>
                          </tr>
                        </thead>

                        <tbody>
                        </tbody>

                      </table>
                    </div>
                    <!-- /.box-body -->



                  </div>
                  <!-- /.box -->


          </div>
        </div>
<!-- CRUD TEST STOP -->
      <!-- Sub Organizaion table stats here -->
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Sub Organization</h3>
                <button type="button" class="btn btn-primary pull-right btnsuborginsert" name="button">Add Suborg.</button>
              </div>
              <div class="box-body">
                <table class="table table-striped table-bordered suborgtable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Department Name</th>
                      <th>Organization Name</th>
                      <!-- <th>Details</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Designations</h3>
                  <button type="button" class="btn btn-primary pull-right btndesginsert" name="button">Add Desg.</button>
                </div>
                <div class="box-body">
                  <table class="table table-striped table-bordered desgtable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Designation Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
        </div>

        <!-- Sub Organizaion table End here -->


        <div class="modal fade" id="modal-insert-test" data-backdrop="static">
          <div class="modal-dialog">

            <form method="post" id="insert_form_test" class="form-horizontal" data-toggle="validator">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="orgModalHeader"></h4>
                </div>

                <div class="modal-body">
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Organization Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="addorgname" id="addorgname" placeholder="Enter Organization Name" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Organization address</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="addorgaddr" name="addorgaddr" placeholder="Enter Organization Address" minlength="4" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Organization Details</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="addorgdetails" name="addorgdetails" placeholder="Enter Organization Details">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Organization Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" id="userImage" name="userImage">
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <input type="hidden" name="orgid" id="orgid" value="">
                  <input type="hidden" name="action" id="action" class="btn btn-success" value="" />
                  <input type="submit" class="btn btn-success" id="modalSubmitBtn" value="Add Organizaion" />
                  <!-- <input type="submit" form="insert_form_test" class="btn btn-primary" name="action" value="Add" /> -->
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- Sub Organizaion Modal stats here -->

        <div class="modal fade" id="modal-suborg" data-backdrop="static">
          <div class="modal-dialog">

            <form method="post" id="suborg_insert" class="form-horizontal" data-toggle="validator">
              <?php echo validation_errors(); ?>
              <?php echo form_open('suborg_insert'); ?>
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="suborgModalHeader"></h4>
                </div>

                <div class="modal-body">
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Organizaion Name</label>
                    <div class="col-sm-8">
                      <select class="col-sm-12 form-control select2" id="orgForSuborg" name="orgForSuborg" style="width: 100%;"  name="">

                      </select>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Sub Organizaion</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="suborgname" name="suborgname" placeholder="Enter Organization Address" minlength="4" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4 control-label">Department Details</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="suborgdetails" name="suborgdetails" placeholder="Enter Organization Details">
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <input type="hidden" name="suborgid" id="suborgid" value="">
                  <input type="hidden" name="suborgaction" id="suborgaction" class="btn btn-success" value="" />
                  <input type="submit" class="btn btn-success" id="SomodalSubmitBtn" value="" />
                  <!-- <input type="submit" form="insert_form_test" class="btn btn-primary" name="action" value="Add" /> -->
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- Sub Organizaion Modal End here -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
