<?php echo validation_errors(); ?>
<?php echo form_open('admin/'.$this->comman_class.'/edit/'.$extra['ID'],array("class"=>"form-horizontal")); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit <?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

	
<div class="input_fields_wrap col-md-9">		
	<div class="form-group">			
		<label for="Date" class="col-md-1">Date</label>
		<div class="col-md-3">
			<input type="text" name="Date" value="<?= convert_date($extra['Date']) ?>" class="form-control datepicker" id="Date" />
		</div>
        
        <label for="Extra" class="col-md-1">Extra</label>
		<div class="col-md-2 input-group">
          <input type="text" name="Extra" value="<?= $extra['Extra'] ?>" class="form-control" id="Extra" />
          <div class="input-group-addon">%</div>
        </div>
    </div>    
</div>	
    
    <div class="form-group">
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary add_field_button">Add More</button>
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

<script>
$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><label for="Date" class="col-md-1">Date</label><div class="col-md-3"><input type="text" name="NewDate[]" value="" class="form-control datepicker" id="Date" /></div><label for="Extra" class="col-md-1">Extra</label><div class="col-md-2 input-group"><input type="text" name="NewExtra[]" value="" class="form-control" id="Extra" /><div class="input-group-addon">%</div></div><button class="col-md-1 btn btn-danger remove_field">X</button></div>'); //add input box
        }
		$('.datepicker').datepicker({format: 'dd-mm-yyyy'});
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

<style>
.input-group[class*=col-]{
	float: left;
	padding-right: 15px;
    padding-left: 15px;
}
</style>