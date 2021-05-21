<style>
.card-content p{color: #333 !important;}
</style>
<div class="in-wrap">
    
    <section id="intro" class="intro-section2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content-section search-results">
    	<div class="container-fluid">
        	<div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Booking History</h4>
                            </div>
                        </div>
                        <?php if(empty($booking)){ ?>
                        <div class="row b-history">
                            <div class="col-md-12 text-center">
                            	<img src="<?php echo base_url('front/imgs/inbox.png'); ?>" class="img-responsive inbx">
                                <h3>You have not booked any Taxi.</h3>
                            </div>
                        </div>
                        <?php } else {
						/*foreach($booking as $row){ ?>
						<div class="row card-content b-history">
                            <div class="col-sm-3 col-xs-12 text-left">
                                <p><i class="zmdi zmdi-pin zmdi-hc-lg"></i> &nbsp; <?php echo $row['FromLoc']?></p>
                                <p><i class="zmdi zmdi-pin-drop zmdi-hc-lg"></i> &nbsp; <?php echo $row['ToLoc']?></p>
                               
                            </div>
                            <div class="col-sm-3 col-xs-12 text-left">
                               	<p><i class="zmdi zmdi-car-taxi zmdi-hc-lg"></i> &nbsp; <?php echo "Provider: ".$row['CompanyName']?></p>
                                <p><i class="zmdi zmdi-tablet-android zmdi-hc-lg"></i> &nbsp; <?php echo $row['ContactNumber']?></p>
                                <p><i class="zmdi zmdi-pin zmdi-hc-lg"></i> &nbsp; <?php echo $row['StreetAddress']?></p>
                               
                            </div>
                            <div class="col-sm-3 col-xs-12 text-left">
                                <p><i class="zmdi zmdi-time zmdi-hc-lg"></i>&nbsp; Pickup: <?php echo $row['StartDateTime']?></p>
                                
                                 
								<?php 	if ($row['IsRound']){
											echo '<p><i class="zmdi zmdi-time-restore zmdi-hc-lg"></i>&nbsp; Return: '. $row['EndDateTime'] .'</p>';
											echo '<p><i class="zmdi zmdi-time-restore-setting zmdi-hc-lg"></i>&nbsp; Trip: Round';
										}
								   		else{
											echo '<p><i class="zmdi zmdi-time-restore-setting zmdi-hc-lg"></i>&nbsp; Trip: Single';
										}?>
                               	</p>
                            </div>
                            <div class="col-sm-1 col-xs-6 text-left">
                            	<p>Booking ID</p>
                                <h4><?php echo $row['ID']?></h4>
                            </div>
                            <div class="col-sm-2 col-xs-6 text-left">
                            	<p>Paid Amount</p>
                                <h4><?php echo CURRENCY.$row['TotalFare']?></h4>
                            </div>
                        </div>
                        <?php } */
						foreach($booking as $row)
						{
							if($row['IsRound'] == '1')
							{ 
								$return_cap = $this->Booking_model->get_company_details($row['ID']); 
								$cap_fare = $this->db->select('TotalFee')->where('ID', $return_cap['ID'])->get('payment')->row_array();
								?>
                                
								<div class="row card-content b-history">
									<div class="col-sm-10 text-left">
										<p><i class="glyphicon glyphicon-time"></i> &nbsp; Pickup: <?php echo $row['EndDateTime']?> &nbsp; &nbsp; <i class="zmdi zmdi-car-taxi zmdi-hc-lg"></i> &nbsp; <?php echo $return_cap['CompanyName'] ?> &nbsp; &nbsp; <i class="zmdi zmdi-tablet-android zmdi-hc-lg"></i> &nbsp; <?php echo $return_cap['ContactNumber']?></p>
										<p><i class="glyphicon glyphicon-map-marker"></i> &nbsp; <?php echo $row['ToLoc']?> &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; <?php echo $row['FromLoc']?> </p>
									</div>
									<div class="col-sm-2 history_price_section">
										<p><i class="zmdi zmdi-label zmdi-hc-lg"></i> <?php echo $row['ID']?></p>
										<p class="history_price"><?php echo CURRENCY.$cap_fare['TotalFee']?></p>
									</div>
								</div>
						<?php } 
						$cap_fare = $this->db->select('TotalFee')->where('BookingID', $row['ID'])->get('payment')->row_array(); 
						/*if( $_SERVER['REMOTE_ADDR'] == '123.201.16.80' ){
							print_r($row);
						}*/
						?>
                        
                        <div class="row card-content b-history">
                            <div class="col-sm-10 text-left">
                               	<p><i class="glyphicon glyphicon-time"></i> &nbsp; Pickup: <?php echo $row['StartDateTime']?> &nbsp; &nbsp; <i class="zmdi zmdi-car-taxi zmdi-hc-lg"></i> &nbsp; <?php echo $row['CompanyName'] ?> &nbsp; &nbsp; <i class="zmdi zmdi-tablet-android zmdi-hc-lg"></i> &nbsp; <?php echo $row['ContactNumber']?></p>
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp; 
								<?php echo $row['FromLoc']?> &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; 
                                <?php 
								if($row['via'] != '') 
								{
									echo $row['via']; ?>
									&nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp;
								<?php 
								}  
									echo $row['ToLoc']; ?>
                                </p>
                            </div>
                            <div class="col-sm-2 history_price_section">
                            	<p><i class="zmdi zmdi-label zmdi-hc-lg"></i> <?php echo $row['ID']?></p>
                            	<p class="history_price"><?php echo CURRENCY.$cap_fare['TotalFee']?></p>
                            </div>
                        </div>
                        <?php 
						}
					}?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>