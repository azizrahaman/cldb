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
					<img src="http://placehold.it/150x150" alt="contactimage" class="">
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
			<div class="col-sm-3">
				<div class="form-group">
					<label>Salutation</label>
					<select name="salutation" class="form-control">
<option value="" selected="selected">-- salutation --</option>
<option value="1">Mr</option>
<option value="2">Mrs</option>
</select>				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" value="" name="firstname" class="form-control">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Middle Name</label>
					<input type="text" value="" name="middlename" class="form-control">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" value="" name="lastname" class="form-control">
				</div>
			</div>
		</div>

		<!-- Contact Group -->
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>Group *</label>
					<select name="group" class="form-control" required="">
<option value="" selected="selected">-- contact group --</option>
<option value="1">Family</option>
<option value="2">Business</option>
<option value="3">Friends</option>
<option value="5">Prospect</option>
</select>				</div>
			</div>

		</div><hr>

		<!-- company / organization, job title -->
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Company / Organization</label>
					<input type="text" value="" name="company" class="form-control">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Job Title</label>
					<input type="text" value="" name="position" class="form-control">
				</div>
			</div>
		</div>

		<!-- industry -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Industry</label>
					<select class="form-control select2" id="unions" style="width: 100%;" onchange=""  multiple="multiple">
            <option value="" selected="selected">-- select industry --</option>
            <option value="1">Accounting / Audit / Tax Services</option>
            <option value="2">Advertising / Marketing / Promotion / PR</option>
            <option value="3">Aerospace / Aviation / Airline</option>
            <option value="4">Agricultural / Plantation / Poultry / Fisheries</option>
            <option value="5">Apparel</option>
            <option value="6">Architectural Services / Interior Designing</option>
            <option value="7">Arts / Design / Fashion</option>
            <option value="8">Automobile / Automotive Ancillary / Vehicle</option>
            <option value="9">Banking / Financial Services</option>
            <option value="10">BioTechnology / Pharmaceutical / Clinical research</option>
            <option value="11">Call Center / IT-Enabled Services / BPO</option>
            <option value="12">Chemical / Fertilizers / Pesticides</option>
            <option value="13">Computer / Information Technology (Hardware)</option>
            <option value="14">Computer / Information Technology (Software)</option>
            <option value="15">Construction / Building / Engineering</option>
            <option value="16">Consulting (Business &amp; Management)</option>
            <option value="17">Consulting (IT, Science, Engineering &amp; Technical)</option>
            <option value="18">Consumer Products / FMCG</option>
            <option value="19">Education</option>
            <option value="20">Electrical &amp; Electronics</option>
            <option value="21">Entertainment / Media</option>
            <option value="22">Environment / Health / Safety</option>
            <option value="23">Exhibitions / Event management / MICE</option>
            <option value="24">Food &amp; Beverage / Catering / Restaurant</option>
            <option value="25">Gems / Jewellery</option>
            <option value="26">General &amp; Wholesale Trading</option>
            <option value="27">Government / Defence</option>
            <option value="28">Grooming / Beauty / Fitness</option>
            <option value="29">Healthcare / Medical</option>
            <option value="30">Heavy Industrial / Machinery / Equipment</option>
            <option value="31">Hotel / Hospitality</option>
            <option value="32">Human Resources Management / Consulting</option>
            <option value="33">Insurance</option>
            <option value="34">Journalism</option>
            <option value="35">Law / Legal</option>
            <option value="36">Library / Museum</option>
            <option value="37">Manufacturing / Production</option>
            <option value="38">Marine / Aquaculture</option>
            <option value="39">Mining</option>
            <option value="40">Non-Profit Organisation / Social Services / NGO</option>
            <option value="41">Oil / Gas / Petroleum</option>
            <option value="42">Polymer / Plastic / Rubber / Tyres</option>
            <option value="43">Printing / Publishing</option>
            <option value="44">Property / Real Estate</option>
            <option value="45">R&amp;D</option>
            <option value="46">Repair &amp; Maintenance Services</option>
            <option value="47">Retail / Merchandise</option>
            <option value="48">Science &amp; Technology</option>
            <option value="49">Security / Law Enforcement</option>
            <option value="50">Semiconductor/Wafer Fabrication</option>
            <option value="51">Sports</option>
            <option value="52">Stockbroking / Securities</option>
            <option value="53">Telecommunication</option>
            <option value="54">Textiles / Garment</option>
            <option value="55">Tobacco</option>
            <option value="56">Transportation / Logistics</option>
            <option value="57">Travel / Tourism</option>
            <option value="58">Utilities / Power</option>
            <option value="59">Wood / Fibre / Paper</option>
            <option value="60">Others</option>
          </select>
	     </div>
			</div>
		</div>

		<!-- primary email, mobile number -->
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Primary Email</label>
					<input type="email" value="" name="email" class="form-control">
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Mobile # <a class="btn btn-sm showmobileinfo" href="#"><i class="fa fa-question-circle"></i></a></label>
					<input type="text" value="" name="mobile" class="form-control">
				</div>
			</div>
		</div>

		<!-- Work phone -->
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Work Phone</label>
					<input type="text" value="" name="workphone" class="form-control">
				</div>
			</div>
		</div>

		<!-- work address -->
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label>Work Address</label>
					<textarea type="text" name="workaddress" class="form-control"></textarea>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Home Address</label>
					<textarea type="text" name="homeaddress" class="form-control"></textarea>
				</div>
			</div>
		</div>

		<!-- notes -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label>Notes</label>
					<ul class="wysihtml5-toolbar" style=""><li class="dropdown">
  <a class="btn btn-default dropdown-toggle " data-toggle="dropdown">
    <span class="glyphicon glyphicon-font"></span>
    <span class="current-font">Normal text</span>
    <b class="caret"></b>
  </a>
  <ul class="dropdown-menu">
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div" tabindex="-1" href="javascript:;" unselectable="on">Normal text</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1" tabindex="-1" href="javascript:;" unselectable="on">Heading 1</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2" tabindex="-1" href="javascript:;" unselectable="on">Heading 2</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h3" tabindex="-1" href="javascript:;" unselectable="on">Heading 3</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h4" tabindex="-1" href="javascript:;" unselectable="on">Heading 4</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h5" tabindex="-1" href="javascript:;" unselectable="on">Heading 5</a></li>
    <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h6" tabindex="-1" href="javascript:;" unselectable="on">Heading 6</a></li>
  </ul>
</li>
<li>
  <div class="btn-group">
    <a class="btn  btn-default" data-wysihtml5-command="bold" title="CTRL+B" tabindex="-1" href="javascript:;" unselectable="on">Bold</a>
    <a class="btn  btn-default" data-wysihtml5-command="italic" title="CTRL+I" tabindex="-1" href="javascript:;" unselectable="on">Italic</a>
    <a class="btn  btn-default" data-wysihtml5-command="underline" title="CTRL+U" tabindex="-1" href="javascript:;" unselectable="on">Underline</a>
  </div>
</li>
<li>
  <div class="btn-group">
    <a class="btn  btn-default" data-wysihtml5-command="insertUnorderedList" title="Unordered list" tabindex="-1" href="javascript:;" unselectable="on"><span class="glyphicon glyphicon-list"></span></a>
    <a class="btn  btn-default" data-wysihtml5-command="insertOrderedList" title="Ordered list" tabindex="-1" href="javascript:;" unselectable="on"><span class="glyphicon glyphicon-th-list"></span></a>
    <a class="btn  btn-default" data-wysihtml5-command="Outdent" title="Outdent" tabindex="-1" href="javascript:;" unselectable="on"><span class="glyphicon glyphicon-indent-right"></span></a>
    <a class="btn  btn-default" data-wysihtml5-command="Indent" title="Indent" tabindex="-1" href="javascript:;" unselectable="on"><span class="glyphicon glyphicon-indent-left"></span></a>
  </div>
</li>
<li>
  <div class="bootstrap-wysihtml5-insert-link-modal modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Insert link</h3>
        </div>
        <div class="modal-body">
          <input value="http://" class="bootstrap-wysihtml5-insert-link-url form-control">
          <div class="checkbox"><label> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="">Open link in new window</label></div>
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss="modal">Cancel</a>
          <a href="#" class="btn btn-primary" data-dismiss="modal">Insert link</a>
        </div>
      </div>
    </div>
  </div>
  <a class="btn  btn-default" data-wysihtml5-command="createLink" title="Insert link" tabindex="-1" href="javascript:;" unselectable="on">
    <span class="glyphicon glyphicon-share"></span>
  </a>
</li>
<li>
  <div class="bootstrap-wysihtml5-insert-image-modal modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Insert image</h3>
        </div>
        <div class="modal-body">
          <input value="http://" class="bootstrap-wysihtml5-insert-image-url form-control">
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" data-dismiss="modal">Cancel</a>
          <a class="btn btn-primary" data-dismiss="modal">Insert image</a>
        </div>
      </div>
    </div>
  </div>
  <a class="btn  btn-default" data-wysihtml5-command="insertImage" title="Insert image" tabindex="-1" href="javascript:;" unselectable="on">
    <span class="glyphicon glyphicon-picture"></span>
  </a>
</li>
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
