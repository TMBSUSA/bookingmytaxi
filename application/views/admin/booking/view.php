<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  
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
            
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tbody>
                            <tr>
                                <td>User Details</td>
                                <td><?php echo $booking['FirstName'] ." ". $booking['LastName'] ." - ". $booking['Contact']; ?></td>
                            </tr>
                            <tr>   
                                <td>Company Details</td>  
                                <td><?php 
										if($booking['IsRound'] == '1'){
										  echo "<b>Going Out:</b> ".$booking['CompanyName'] ." - ".$booking['ContactNumber']."<br />";
										  echo "<b>Return:</b> ".$return_company_details['CompanyName'] ." - ".$return_company_details['ContactNumber']."<br />";	  
										}else{
											echo $booking['CompanyName'] ." - ".$booking['ContactNumber'] ; 	  
										}?>
                                </td>
                            </tr> 
                            <tr>   
                                <td>Trip</td>  
                                <td><?php 
										if($booking['IsRound'] == '1'){
											echo "Round";	  
										}else{
											echo "Single";	  
										} ?>
                               	</td>	
                            </tr>     
                            <tr>
                                <td>Journey Time</td>  
                                <td><?php echo convert_date_time($booking['StartDateTime']); ?></td>
                            </tr>
                            <?php if($booking['IsRound'] == '1'){ ?>
                            <tr>
                                <td>End Time</td>  
                                <td><?php echo convert_date_time($booking['EndDateTime']) ?></td>
                            </tr>
							<?php }?>
                            <tr>
                                <td>Luggage</td>  
                                <td><?php echo $booking['Luggage']; ?></td>
                            </tr>
                            <tr>  
                                <td>Total Fare</td>  
                                <td><?php echo convert_price($booking['TotalFare']); ?></td>
                            </tr>
                            <tr>  
                                <td>Rating</td>  
                                <td><?php echo $booking['Rating']; ?></td>
                            </tr>
                            <tr>  
                                <td>Status</td>  
                                <td><?php echo $booking['Status']; ?></td>
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