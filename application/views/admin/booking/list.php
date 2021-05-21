<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<style>
.table>thead>tr>th{vertical-align: baseline;}
.checktd{padding: 7px 18px !important;}
.deletebooking{ padding: 7px; }
.margin7{ margin-left: 7px; }
</style> 
 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $this->title ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                
                    <div class="col-md-8">
                       	<label class="pull-left">
                            <select name="pagesize" class="form-control input-sm" id="pagesize">
                                <option value="10" <?php if($pagesize == '10'){ echo "selected"; }?>>10</option>
                                <option value="25" <?php if($pagesize == '25'){ echo "selected"; }?>>25</option>
                                <option value="50" <?php if($pagesize == '50'){ echo "selected"; }?>>50</option>
                                <option value="100" <?php if($pagesize == '100'){ echo "selected"; }?>>100</option>
                            </select>
                       	</label>
                        <?php echo form_open('admin/booking/action',array("class"=>"deletebooking pull-left", "id"=>"deletebooking")); ?>
                            <input type="submit" class="btn btn-danger btn-sm" name="action" value="Delete">
                        	<?php /*?><input type="submit" class="btn btn-success btn-sm margin7" name="action" value="Mark as Completed">
                            <input type="submit" class="btn btn-warning btn-sm margin7" name="action" value="Mark as Failed"><?php */?>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="col-sm-4">
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
                                <th>User Details</th>
                                <th>Company Details</th>
                                <th>Trip Details</th>
                                <th>Fare Details</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="<?= $this->comman_class ?>">
                            <?php if(!empty($providers)): foreach($providers as $b): ?>
                                
                                <tr class="odd gradeX">
                                	<td class="checktd">
                                   	<input type="checkbox" name="bid[]" value="<?= $b['ID'] ?>" class="checkbox" form="deletebooking" />
                                    </td>
                                    <td style="text-transform:capitalize">
										<?php echo $b['FirstName'] ." ". $b['LastName'] ." - ". $b['Contact']; ?>
                                    </td>
                                    <td><?php 	
if($b['IsRound'] == '1')
{
 	$return_company_details = $this->Booking_model->get_company_details($b['ID']);
	
	echo "Trip: Round <br />";
	echo "<b>Going Out:</b><br />".$b['CompanyName'] ." - ".$b['ContactNumber']."<br />";
  	echo "<b>Return:</b><br />".$return_company_details['CompanyName'] ." - ".$return_company_details['ContactNumber'];	  
	
}
else
{
	echo "Trip: Single <br />"; 
	echo $b['CompanyName'] ." - ".$b['ContactNumber']; 	
}?>
                                    </td>
                                    <td><?php echo "From : ". $b['FromLoc'] ."<br>";
											  echo "to : ". $b['ToLoc'] ."<br>";
											  echo "Start : ". convert_date_time($b['StartDateTime']) ."<br>";
											  if($b['IsRound'] == '1'){
												echo "End : ". convert_date_time($b['EndDateTime']) ;  
											  }?></td>
                                    <td><?php echo "Total fare : ".convert_price($b['TotalFee'])."<br>"; 
											  echo "Taxi fare : ".convert_price($b['TaxiFee'])."<br>"; 
											  echo "Admin fee : ".convert_price($b['AdminFee'])."<br>"; 
											  echo "Commision : ".$b['AdminPercentage']."%"; ?></td>
                                    
                                    <td>
                                    	<?php 	if($b['Status'] == 'Completed')
												{
													echo "<i class='fa fa-check text-success' aria-hidden='true'></i> "; 
												}
												elseif($b['Status'] == 'Pending')
												{
													echo "<i class='fa fa-clock-o text-warning' aria-hidden='true'></i> ";
												}
												elseif($b['Status'] == 'Failed')
												{
													echo "<i class='fa fa-close text-danger' aria-hidden='true'></i> ";
												}?>
                                        <a href="<?= base_url('admin/'.$this->comman_class.'/view/').$b['ID'] ?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                        <a href="<?= base_url('admin/'.$this->comman_class.'/edit/').$b['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        <a href="<?= base_url('admin/'.$this->comman_class.'/remove/').$b['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                
								<?php endforeach; else: ?>
                                <p><?= $this->title ?> not available.</p>
                                <?php endif; ?>
                                <tr class="odd gradeX">
                                    <td colspan="10">
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