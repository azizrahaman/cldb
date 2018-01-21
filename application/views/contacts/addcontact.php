<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New <small>Contact</small>
          </h1>
          <!--ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Blank page</li>
          </ol-->
          <ul class="breadcrumb"><li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Home</a></li><li><a href="<?php echo base_url(); ?>index.php/Contacts">Contact</a></li><li>Add</li></ul>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
        <div class="box">
            <div class="box-body">



            <form action="http://mycontact.otoworkz.my/contact/insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">

            <div class="row">
            	<div class="col-sm-12"><h4><i class="fa fa-th"></i> Contact Information</h4><hr></div>
            </div>
            <div class="row">

            	<div class="col-sm-3 text-center">
            		<div class="form-group">
            			<div class="fileinput fileinput-new" data-provides="fileinput">
            				<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
            					<img src="<?php echo base_url(); ?>assets/aziz/imgs/150x150.png" alt="contactimage" class="">
            				</div>
            				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px">
            				</div>
            				<div>
            					<span class="btn btn-xs btn-info btn-file">
            						<span class="fileinput-new">Select image</span>
            						<span class="fileinput-exists">Change</span>
            						<input name="userfile" type="file" accept="image/*"> <!-- User Image Input -->
            						<input type="hidden" value="" name="contactimage">
            					</span>
            					<a href="#" class="btn btn-xs btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
            				</div>
            			</div>
            		</div>
            		<small></small><p class="text-info"><small><i><i class="fa fa-info-circle"></i> Image height and width must not exceed 300px</i></small>
            	</p></div>

            	<div class="col-sm-9">


            		<!-- salutation, first name, middle name, last name -->
            		<div class="row">
            			<div class="col-sm-2">
            				<div class="form-group">
            					<label>Gender</label>
            					<select name="gender" class="form-control">
                        <option value="" selected="selected">-- select --</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                      </select>
                    </div>
            			</div>
            			<div class="col-sm-5">
            				<div class="form-group">
            					<label>Full Name</label>
            					<input type="text" value="" name="fullname" class="form-control">
            				</div>
            			</div>
            			<div class="col-sm-5">
            				<div class="form-group">
            					<label>Father Name</label>
            					<input type="text" value="" name="fathername" class="form-control">
            				</div>
            			</div>
            			<div class="col-sm-4">
            				<div class="form-group">
            					<label>Phone No </label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
              					<input type="text" value="" name="phoneno" class="form-control">
                      </div>
            				</div>
            			</div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Alternet Phone</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        <input type="text" class="form-control" name="phoneno2" id="">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Alternet Phone</label>
                      <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        <input type="text" class="form-control" name="phoneno3" id="">
                      </div>
                    </div>
                  </div>

            		</div>


                <hr>

            		<!-- company / organization, job title -->
                <div class="add-user-wrapper">
                		<div class="row workspace-input">
                			<div class="col-sm-4">

                				<div class="form-group">
                					<label>Company / Organization</label>
                          <select class="form-control orgclass select2" style="width: 100%;" onchange="" name="organization">
                          </select>
                				</div>
                			</div>
                			<div class="col-sm-4">
                				<div class="form-group">
                					<label>Department / Sub Org.</label>
                          <select class="form-control suborgclass select2" style="width: 100%;" onchange="" name="suborg">
                          </select>
                				</div>
                			</div>
                      <div class="col-sm-3">
                				<div class="form-group">
                					<label>Designation</label>
                          <select class="form-control desgclass select2" style="width: 100%;" onchange="" name="Designation">
                          </select>
                				</div>
                			</div>
                      <div class="col-sm-1">
                        <div class="form-group">
                          <label>­­&nbsp;</label>
                          <button type="button" style="" class="btn btn-primary form-control add-dynamic-workspace" name="button" data-toggle="tooltip" title="Add Another workspace!"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                		</div>
                  </div>

            <hr>
            		<!-- primary email, mobile number -->
            		<div class="row">
            			<div class="col-sm-4">
                    <label for="exampleInputEmail1">Parmanent Address</label>
                    <form class="" action="" method="post">

                    <div class="form-group">
                      <!-- <input type="text" name="orgname" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                      <select class="form-control" id="divisions" style="width: 100%;" onchange="" name="division-parma">
                        <option selected="selected">Select Division</option>
                        <?php
                          foreach ($divs as $key) { ?>
                            <option value="<?php echo $key->fld_id; ?>"><?php echo $key->fld_bn_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="districts" style="width: 100%;" onchange="" name="district-parma">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control" id="upazila" style="width: 100%;" onchange="" name="upazilla-parma">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="allunions" style="width: 100%;" onchange="" name="union-parma">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="villages" style="width: 100%;" onchange="" name="village-parma">
                      </select>
                    </div>
                    </form>

            			</div>
            			<div class="col-sm-4">
                    <label for="exampleInputEmail1">Present Address</label>
                    <form class="" action="" method="post">
                    <div class="form-group">

                      <!-- <input type="text" name="orgname" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                      <select class="form-control" id="divisions1" style="width: 100%;" onchange="" name="division-prese">>
                        <option selected="selected"></option>
                        <?php
                          foreach ($divs as $key) { ?>
                            <option value="<?php echo $key->fld_id; ?>"><?php echo $key->fld_bn_name; ?></option>
                        <?php  } ?>

                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="districts1" style="width: 100%;" onchange="" name="district-prese">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control" id="upazila1" style="width: 100%;" onchange="" name="upazilla-prese">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="allunions1" style="width: 100%;" onchange="" name="union-prese">
                      </select>
                    </div>
                    <div class="form-group">

                      <select class="form-control select2" id="villages1" style="width: 100%;" onchange="" name="village-prese">
                      </select>
                    </div>
                    </form>
            			</div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="">Date of Birth</label>
                      <div class="input-group date">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="dob">
                      </div>
                    </div>
                  </div>
            		</div>





            		<!-- notes -->
            		<div class="row">
            			<div class="col-sm-12">
            				<div class="form-group">
            					<label>Notes</label>
                      <textarea name="name" class="form-control" id="user-details-text" name="note"></textarea>
            				</div>
            			</div>
            		</div><hr>

            		<div class="text-center">
            			<a href="" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            			<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Save</button>
            		</div><br>

            	</div>
            </div>
            </form>



          </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
