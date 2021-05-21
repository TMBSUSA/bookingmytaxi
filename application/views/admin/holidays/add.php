
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
	<?php echo form_open('admin/holidays/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
        <label for="City" class="col-md-2">Provider</label>
        <div class="col-md-4">
            <select name="ProviderID" class="form-control" required>
                <option value="">Select Provider</option>
                <?php 
                foreach($Providers as $Provider)
                {
                    echo '<option value="'.$Provider['ID'].'">'.$Provider['CompanyName'].'</option>';
                } 
                ?>
            </select>
        </div>
    </div>
    
	<div class="form-group">
		<label for="Date" class="col-md-2">Date</label>
		<div class="col-md-4">
			<input type="text" name="Date" value="<?php echo $this->input->post('Date'); ?>" class="form-control datepicker" id="Date" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>

</div>

<link href="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url()?>theme/vendor/wickedpicker/wickedpicker.min.js"></script>
<script>
$('.timepicker').wickedpicker();
</script>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
      var date_input=$('.datepicker'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
		todayBtn: "linked"
      };
      date_input.datepicker(options);
	  
    })
</script>
