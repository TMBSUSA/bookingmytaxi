<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<style>
.table>thead>tr>th{vertical-align: baseline;}
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
                <form method="post" action="<?= base_url('admin/'.$this->comman_class.'/')?>" id="pagesizeform">
                    <div class="col-sm-6">
                       	<label>
                            <select name="pagesize" class="form-control input-sm" id="pagesize">
                                <option value="10" <?php if($pagesize == '10'){ echo "selected"; }?>>10</option>
                                <option value="25" <?php if($pagesize == '25'){ echo "selected"; }?>>25</option>
                                <option value="50" <?php if($pagesize == '50'){ echo "selected"; }?>>50</option>
                                <option value="100" <?php if($pagesize == '100'){ echo "selected"; }?>>100</option>
                            </select>
                       	</label>
                    </div>
                    <div class="col-sm-6">
                        <div class="pull-right">
                            <label><input type="search" name="searchKey" id="searchKey" class="form-control input-sm" placeholder="Search" value="<?= $searchKey ?>"></label>
                            <button class="btn btn-primary btn-sm searchBtn">Search</button>
                        </div>
                    </div>
                </form>    
            </div>
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Provider</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="provider">
                            <?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
                                <tr class="odd gradeX">
                                    <td><?= $provider['CompanyName'] ?> </td>
                                    <td><?= date("d-m-Y", strtotime($provider['Date'])) ?> </td>
                                    <td>
                                    	<a href="<?= base_url('admin/'.$this->comman_class.'/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        <a href="<?= base_url('admin/'.$this->comman_class.'/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
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
</script>        