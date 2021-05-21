<?php echo validation_errors(); ?>
<?php echo form_open('admin/'.$this->comman_class.'/edit/'.$special_fare['ID'],array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="form-group">
        <label for="City" class="col-md-2">Provider</label>
        <div class="col-md-4">
            <select name="ProviderID" class="form-control" required>
                <option value="">Select Provider</option>
                <?php 
                foreach($Providers as $Provider)
                {
                    if($Provider['ID'] == $special_fare['ProviderID']){
						echo '<option value="'.$Provider['ID'].'" selected>'.$Provider['CompanyName'].'</option>';	
					}else{
						echo '<option value="'.$Provider['ID'].'">'.$Provider['CompanyName'].'</option>';	
					}
                } 
                ?>
            </select>
        </div>
    </div>
    
	<div class="form-group">
		<label for="Date" class="col-md-2">Date</label>
		<div class="col-md-4">
			<input type="text" name="Date" value="<?php echo ($this->input->post('Date') ? $this->input->post('Date') : date("d-m-Y", strtotime($special_fare['Date']))); ?>" class="form-control datepicker" id="Date" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
</div>	
<?php echo form_close(); ?>

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