<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
 
<style>
.table>thead>tr>th{vertical-align: baseline;}
.checktd{padding: 7px 18px !important;}
</style> 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">City</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                
                    <div class="col-md-6">
                       	<label class="pull-left">
                            <select name="pagesize" class="form-control input-sm" id="pagesize">
                                <option value="10" <?php if($pagesize == '10'){ echo "selected"; }?>>10</option>
                                <option value="25" <?php if($pagesize == '25'){ echo "selected"; }?>>25</option>
                                <option value="50" <?php if($pagesize == '50'){ echo "selected"; }?>>50</option>
                                <option value="100" <?php if($pagesize == '100'){ echo "selected"; }?>>100</option>
                            </select>
                       	</label>
                        <?php echo form_open('admin/city/delete',array("class"=>"multidelete pull-left", "id"=>"multidelete")); ?>
                            <button type="submit" class="btn btn-danger btn-sm" style="margin: 7px;">Delete </button>
                        <?php echo form_close(); ?>
                        <button class="btn btn-primary btn-sm" style="margin: 7px;" data-toggle="modal" data-target="#myModal"> Add City</button>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">
                            <label><input type="search" name="searchKey" id="searchKey" class="form-control input-sm" placeholder="Search" value="<?= $searchKey ?>"></label>
                            <button class="btn btn-primary btn-sm searchBtn">Search</button>
                        </div>
                    </div>
                
            </div>
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th style="width: 1px;"><input id="select_all" type="checkbox" /></th>
                                <th>City Name</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="provider">
                            <?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
                                <tr class="odd gradeX">
                                   	<td class="checktd">
                                   	<input type="checkbox" name="ids[]" value="<?= $provider['ID'] ?>" class="checkbox" form="multidelete" />
                                    </td>
                                    <td><?= $provider['CityName'] ?> </td>
                                    <td><?= $provider['countryName'] ?> </td>
                                    <td>
                                        <a href="<?= base_url('admin/city/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        <a href="<?= base_url('admin/city/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                
								<?php endforeach; else: ?>
                                <p>Provider(s) not available.</p>
                                <?php endif; ?>
                                <tr class="odd gradeX">
                                    <td colspan="8">
                                        <?php echo $this->ajax_pagination->create_links(); ?>
                                    </td>    
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add City</h4>
        </div>
        <div class="modal-body">
      		<?php echo form_open('admin/city/add',array("class"=>"form-horizontal")); ?>

            <div class="form-group">
                <label for="Country" class="col-md-3" required>Country <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <select name="CountryID" class="form-control">
                        <option value="77">United Kingdom </option>
                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <label for="CityName" class="col-md-3">City Name <span class="text-danger">*</span></label>
                <div class="col-md-4">
                    <input type="text" name="CityName" value="<?php echo $this->input->post('CityName'); ?>" class="form-control" id="CityName" pattern="[A-Za-z]+" oninvalid="setCustomValidity('Enter only Alphabets')" oninput="setCustomValidity('')" required />
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-offset-4 col-md-4">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        
        	<?php echo form_close(); ?>    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<script src="<?= base_url()?>theme/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			searching: false,
			bLengthChange: false,
			bPaginate: false,
			bInfo : false
        });
    });
	$(document).ready(function(){
		$("#pagesize").change(function(){
			//$('#pagesizeform').submit();
			getData(0);
			return false;
		});
		
		$(".searchBtn").click(function(){
			//$('#pagesizeform').submit();
			getData(0);
			return false;
		});
	});
	$(document).ready(function(){
		//select all checkboxes
		$("#select_all").change(function(){  //"select all" change 
			$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
		});
		
		//".checkbox" change 
		$('.checkbox').change(function(){ 
			//uncheck "select all", if one of the listed checkbox item is unchecked
			if(false == $(this).prop("checked")){ //if this item is unchecked
				$("#select_all").prop('checked', false); //change "select all" checked status to false
			}
			//check "select all" if all checkbox items are checked
			if ($('.checkbox:checked').length == $('.checkbox').length ){
				$("#select_all").prop('checked', true);
			}
		});
	});
</script>        