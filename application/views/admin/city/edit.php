<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit City</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
	
    <?php echo form_open('admin/city/edit/'.$city['ID'],array("class"=>"form-horizontal")); ?>

	<div class="form-group">
        <label for="Country" class="col-md-2" required>Country <span class="text-danger">*</span></label>
        <div class="col-md-4">
            <select name="CountryID" class="form-control">
                <option value="77">United Kingdom </option>
            </select>
        </div>
    </div>
    	
	<div class="form-group">
		<label for="CityName" class="col-md-2">City Name <span class="text-danger">*</span></label>
		<div class="col-md-4">
			<input type="text" name="CityName" value="<?php echo ($this->input->post('CityName') ? $this->input->post('CityName') : $city['CityName']); ?>" class="form-control" id="CityName" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Enter only Alphabets')"  oninput="setCustomValidity('')" required />
		</div>
	</div>
    
	<div class="form-group">
		<label for="Identity" class="col-md-2">&nbsp;</label>
        <div class="col-md-4">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
	
<?php echo form_close(); ?>
    
</div>