<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add New            <small>Contact</small>
          </h1>
          <!--ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Blank page</li>
          </ol-->
          <ul class="breadcrumb"><li><a href="http://mycontact.otoworkz.my/"><i class="fa fa-home"></i>Home</a></li><li><a href="http://mycontact.otoworkz.my/contact">Contact</a></li><li>Add</li></ul>        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
                    <div class="box">
            <div class="box-body">



                <form action="http://mycontact.otoworkz.my/contact/insert" method="post" accept-charset="utf-8" enctype="multipart/form-data"><div class="row">
	<div class="col-sm-12"><h4><i class="fa fa-th"></i> Contact Information</h4><hr></div>
</div>
<div class="row">

	<div class="col-sm-3 text-center">
		<div class="form-group">
			<div class="fileinput fileinput-new" data-provides="fileinput">
				<div class="fileinput-new thumbnail" style="width: 150px; height: 150px;" data-trigger="fileinput">
					<img src="http://via.placeholder.com/150x150" alt="contactimage" class="">
				</div>
				<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px">
				</div>
				<div>
					<span class="btn btn-xs btn-info btn-file">
						<span class="fileinput-new">Select image</span>
						<span class="fileinput-exists">Change</span>
						<input name="userfile" type="file" accept="image/*">
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
					<select name="salutation" class="form-control">
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
					<label>Phone No <a class="btn btn-sm showmobileinfo" href="#"><i class="fa fa-question-circle"></i></a></label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-phone"></i>
            </div>
  					<input type="text" value="" name="lastname" class="form-control">
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
              <select class="form-control orgclass select2" style="width: 100%;" onchange="">
              </select>
    				</div>
    			</div>
    			<div class="col-sm-4">
    				<div class="form-group">
    					<label>Department / Sub Org.</label>
              <select class="form-control suborgclass select2" style="width: 100%;" onchange="">
              </select>
    				</div>
    			</div>
          <div class="col-sm-3">
    				<div class="form-group">
    					<label>Designation</label>
              <select class="form-control desgclass select2" style="width: 100%;" onchange="">
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
			<div class="col-sm-6">
				<div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Parmanent Address</h3>
          </div>
          <div class="box-body">

              <div class="box-body">
                <form class="" action="" method="post">

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
                  <select class="form-control select2" id="allunions" style="width: 100%;" onchange="">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Union</label>
                  <select class="form-control select2" id="villages" style="width: 100%;" onchange="">
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
			</div>
			<div class="col-sm-6">
				<div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Present Address</h3>
          </div>
          <div class="box-body">

              <div class="box-body">
                <form class="" action="" method="post">

                <div class="form-group">
                  <label for="exampleInputEmail1">Select Division</label>
                  <!-- <input type="text" name="orgname" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
                  <select class="form-control" id="divisions1" style="width: 100%;" onchange="">
                    <option selected="selected"></option>
                    <?php
                      foreach ($divs as $key) { ?>
                        <option value="<?php echo $key->fld_id; ?>"><?php echo $key->fld_bn_name; ?></option>
                    <?php  } ?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select District</label>
                  <select class="form-control select2" id="districts1" style="width: 100%;" onchange="">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Upzilla</label>
                  <select class="form-control" id="upazila1" style="width: 100%;" onchange="">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Union</label>
                  <select class="form-control select2" id="allunions1" style="width: 100%;" onchange="">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Union</label>
                  <select class="form-control select2" id="villages1" style="width: 100%;" onchange="">
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
			</div>
		</div>





		<!-- notes -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Notes</label>
					<ul class="wysihtml5-toolbar" style="">
</ul><textarea name="notes" class="form-control textarea" style="display: none;"></textarea><input type="hidden" name="_wysihtml5_mode" value="1"><iframe class="wysihtml5-sandbox" security="restricted" allowtransparency="true" frameborder="0" width="0" height="0" marginwidth="0" marginheight="0" style="background-color: rgb(255, 255, 255); border-collapse: separate; border-color: rgb(210, 214, 222); border-style: solid; border-width: 1px; clear: none; display: block; float: none; margin: 0px; outline: rgb(85, 85, 85) none 0px; outline-offset: 0px; padding: 6px 12px; position: static; z-index: auto; vertical-align: baseline; text-align: start; box-sizing: border-box; box-shadow: none; border-radius: 0px; width: 720px; height: 50px; top: auto; left: auto; right: auto; bottom: auto;"></iframe>
				</div>
			</div>
		</div><hr>

		<div class="text-center">
			<a href="http://mycontact.otoworkz.my/contact" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
			<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Save</button>
		</div><br>

	</div>
</div>
</form>


<link rel="stylesheet" type="text/css" href="http://mycontact.otoworkz.my/assets/css/fileinput.css">




          </div><!-- /.box-body -->
          </div><!-- /.box -->


        </section><!-- /.content -->
      </div>
