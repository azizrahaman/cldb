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
                      <button type="button" class="btn btn-primary pull-right" name="button">Add Village</button>
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
                      <table class="table table-bordered librarytable" id="libDataTablex">
                        <thead>
                          <tr>
                            <th style="width: 10px;text-align:center">#</th>
                            <th style="text-align:center">Name</th>
                            <th style="text-align:center">Address</th>
                            <th style="width: 90px;text-align:center">Action</th>
                          </tr>
                        </thead>

                        <tbody id="villdata">



                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->



                  </div>
                  <!-- /.box -->
              </div>


              <div class="col-md-4">
                <!-- general form elements -->
                <div class="box box-primary" style="display:none;" id="villaddform">
                  <div class="box-header with-border">
                    <h3 class="box-title">Add Village</h3>
                  </div>
                  <!-- /.box-header -->


                  <!-- form start -->

                  <form role="form" method="post" id="formAddVill" action="<?php echo base_url();?>index.php/Libraries/AddVill">
                    <div class="box-body">

                      <div class="alert alert-success alert-dismissible villageAdded" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <p>Village Added Successfully</p>
                      </div>

                      <?php echo form_open('form'); ?>
                      <?php echo validation_errors(); ?>

                      <?php if ($msgerr!=NULL) { ?>
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo $msgerr; ?>
                        </div>
                      <?php } ?>

                      <?php if ($msgok!=NULL) { ?>
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <?php echo $msgok; ?>
                        </div>
                      <?php } ?>

                      <div class="form-group">
                        <input type="hidden" name="uniid" id="form_uniid" value="">
                        <label for="exampleInputEmail1">Village Name</label>
                        <input type="text" name="villname" class="form-control" id="exampleInputEmail1" placeholder="Enter Village Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Organization Address</label>
                        <input type="text" name="villnamebn" class="form-control" id="exampleInputEmail1" placeholder="গ্রামের নাম লিখুন">
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary" name="addorg">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
              </div>



        </div>

        <div class="modal modal-danger fade" id="modal-delete" data-backdrop="static">
          <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i> Delete Book Data </h4>
              </div>
              <div class="modal-body">
                <div class="box-body table-responsive">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-12">
                        <input type="hidden" id="delete-id" name="delete-id" />
                        <input type="hidden" id="delete-title" name="delete-title" />
                        <p>Are you sure to delete this data ?</p>
                        <div class="callout callout-danger">
                          <p>Title: <span class="delete-name"> </span></p>
                          <p>Author: <span class="delete-details"> </span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <a href="<?php echo base_url('index.php/Libraries/DelOrg?uid=#delid') ?>" id="btn-delete" type="button" class="btn btn-primary"><i class="fa fa-check"></i> Yes</a>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-edit" data-backdrop="static">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-book"></i> Update Organization </h4>
              </div>
              <div class="modal-body">
                <form role="form" method="post" action="<?php echo base_url();?>index.php/Libraries/UpdateOrg">
                  <div class="box-body">
                    <?php echo form_open('update'); ?>
                    <?php echo validation_errors(); ?>
                    <input type="hidden" name="orgid" id="upuid" >
                    <div class="form-group">
                      <label for="upname">Organization Name</label>
                      <input type="text" name="orgname" class="form-control" id="upname" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="upaddress">Organization Address</label>
                      <input type="text" name="orgaddr" class="form-control" id="upaddress" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="updetails">Organization Details</label>
                      <input type="text" name="orgdetails" class="form-control" id="updetails" placeholder="Enter email">
                    </div>
                  </div>
                  <!-- /.box-body -->

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary" name="updateorg"><i class="fa fa-check"></i> Update</button>
              </div>
              </form>
            </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
