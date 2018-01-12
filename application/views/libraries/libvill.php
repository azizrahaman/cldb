<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Libraries
        <small>Villages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Libraries</a></li>
        <li class="active">Villages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
              <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Select Area</h3>
                  </div>
                  <!-- /.box-header -->


                  <!-- form start -->

                  <form role="form" method="post" action="<?php echo base_url();?>index.php/Libraries/addorg">
                    <div class="box-body">
                      <?php echo form_open('form'); ?>
                      <?php echo validation_errors(); ?>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Division</label>
                        <!-- <input type="text" name="orgname" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                        <select class="form-control" id="divisions" style="width: 100%;" onchange="">
                          <option selected="selected"></option>
                          <?php
                            foreach ($divs as $key) { ?>
                              <option value="<?php echo $key->fld_id; ?>"><?php echo $key->fld_bn_name; ?></option>
                          <?php  } ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select District</label>
                        <select class="form-control select2" id="districts" style="width: 100%;" onchange="">
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Upzilla</label>
                        <select class="form-control" id="upazila" style="width: 100%;" onchange="">
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Select Union</label>
                        <select class="form-control select2" id="unions" style="width: 100%;" onchange="">
                        </select>
                      </div>
                    </div>
                    <!-- /.box-body -->

                  </form>
                </div>
                <!-- /.box -->
              </div>


              <div class="col-md-4">
                <div class="box box-primary" style="display:none;" id="villtable">
                    <div class="box-header with-border">
                      <h3 class="box-title"><span class="uniname"></span></h3>
                      <button type="button" class="btn btn-primary pull-right btnAddVill" name="button">Add Village</button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                      <!-- /.box-header -->


                    <!--
                      <?php if ($msgupdate!=NULL) { ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo $msgupdate; ?>
                        </div>
                      <?php } ?> -->
                      <table class="table table-bordered" id="libTableVill" style="width:100%">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>নাম</th>
                            <th>Action</th>
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

              <div class="col-md-4">
                <div class="box box-primary" style="display:none" id="wardtable">
                  <div class="box-header with-border">
                    <h3 class="box-title">Wards<span class="uniname"></span></h3>
                    <button type="button" class="btn btn-primary pull-right" name="button">Add Ward</button>
                  </div>
                  <div class="box-body">

                    <table class="table table-bordered" id="libTableward">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Word</th>
                          <th>Ward BN</th>
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



        <div class="modal fade" id="modalAddVill" data-backdrop="static">
          <div class="modal-dialog">
            <form class="form-horizontal" method="post" id="formVillCrud" data-toggle="validator">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="titleAddVill"></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Village Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="inputVillName" id="inputVillName" placeholder="Village Name" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">গ্রামের নাম</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="inputVillNameBn" id="inputVillNameBn" placeholder="গ্রামের নাম বাংলায়" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="unionId" id="unionIdforInsert" value="">
                  <input type="hidden" name="villId" id="villIdforupdate" value="">
                  <input type="hidden" name="villaction" id="villaction" value="">
                  <input type="submit" class="btn btn-success" id="formVillSubmit" value="Add Village">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>


        <div class="modal fade" id="modalAddVill" data-backdrop="static">
          <div class="modal-dialog">
            <form class="form-horizontal" method="post" id="formVillCrud" data-toggle="validator">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="titleAddVill"></h4>
                </div>
                <div class="modal-body">
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Village Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="inputVillName" id="inputVillName" placeholder="Village Name" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">গ্রামের নাম</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="inputVillNameBn" id="inputVillNameBn" placeholder="গ্রামের নাম বাংলায়" required>
                      <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="unionId" id="unionIdforInsert" value="">
                  <input type="hidden" name="villId" id="villIdforupdate" value="">
                  <input type="hidden" name="villaction" id="villaction" value="">
                  <input type="submit" class="btn btn-success" id="formVillSubmit" value="Add Village">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
