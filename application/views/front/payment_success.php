<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
	window.location.href = '<?php echo base_url()?>';
});
</script>
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
           		
            	<div class="col-md-7 col-md-offset-1">
                	
                    <div class="card receipt">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Booking Status</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <h2 class="gray-text">Booking Successful</h2><br>
                                <p>
                                <i class="glyphicon glyphicon-map-marker"></i> &nbsp; 
								<?php echo $booking['FromLoc'] ?> &nbsp; 
                                <?php if(isset($booking['via']) && $booking['via'] != '') { echo "<i class='zmdi zmdi-arrow-right zmdi-hc-lg'></i> &nbsp; ".$booking['via']." &nbsp;";} ?> 
                                <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; 
								<?php echo $booking['ToLoc'] ?>  
                                </p>
                                <p><i class="glyphicon glyphicon-time"></i> &nbsp; Pickup: <?php echo $booking['StartDateTime'] ?>  &nbsp; &nbsp; <i class="zmdi zmdi-car-taxi zmdi-hc-lg"></i> &nbsp; <?php echo $provider['CompanyName']?> &nbsp; &nbsp; <i class="zmdi zmdi-tablet-android zmdi-hc-lg"></i> &nbsp; <?php echo $provider['ContactNumber']?> </p>
                                <p><i class="zmdi zmdi zmdi-accounts zmdi-hc-lg"></i> &nbsp; <?php echo $booking['Passanger'] ?> &nbsp; <i class="zmdi zmdi-case zmdi-hc-lg"></i> &nbsp; <?php echo $booking['Luggage'] ?> &nbsp; <i class="zmdi zmdi-car-taxi  zmdi-hc-lg"></i> &nbsp; <?php echo $booking['NeededCar'] ?></p><br>
                            </div>
                            <hr />
                            
                            <?php if($booking['IsRound'] == 1){?>
                            <div class="col-xs-12 text-left">
                                <p><i class="glyphicon glyphicon-map-marker"></i> &nbsp; <?php echo $booking['ToLoc'] ?> &nbsp; <i class="zmdi zmdi-arrow-right zmdi-hc-lg"></i> &nbsp; <?php echo $booking['FromLoc'] ?> </p>
                                <p><i class="glyphicon glyphicon-time"></i> &nbsp; Pickup: <?php echo $booking['EndDateTime'] ?>  &nbsp; &nbsp; <i class="zmdi zmdi-car-taxi zmdi-hc-lg"></i> &nbsp; <?php echo $provider2['CompanyName'] ?> &nbsp; &nbsp; <i class="zmdi zmdi-tablet-android zmdi-hc-lg"></i> &nbsp; <?php echo $provider2['ContactNumber'] ?> </p>
                                <p><i class="zmdi zmdi zmdi-accounts zmdi-hc-lg"></i> &nbsp; <?php echo $booking['Passanger'] ?> &nbsp; <i class="zmdi zmdi-case zmdi-hc-lg"></i> &nbsp; <?php echo $booking['Luggage'] ?> &nbsp; <i class="zmdi zmdi-car-taxi  zmdi-hc-lg"></i> &nbsp; <?php echo $booking['NeededCar'] ?></p><br>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
				<div class="col-md-3">
                	
                    <div class="card receipt">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Payment</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <h2 class="gray-text"><?php echo CURRENCY.$booking['TotalFare'] ?></h2>
                                <p>TOTAL FAIR</p>
                                <hr />
                                <h2 class="gray-text"><?php echo $booking['ID'] ?></h2>
                                <p>BOOKING ID</p>
                            </div>
                        </div>
                    </div>
                    <br>
					<p class="text-left">If you need more information, <a href="#">Contact us</a></p>
                </div> 
                <div class="clearfix"></div><br><br>
				<a href="<?php echo base_url(); ?>" class="btn btn-yellow">Back to Home</a>               
            </div>
        </div>
    </section>
    
    <?php /*?><section class="content-section search-results">
    	<div class="container-fluid">
        	<div class="row">
            	<div class="col-md-6 col-md-offset-3">
                    <div class="card receipt">
                        <div class="row">
                            <div class="col-sm-12 text-left card-header">
                                <h4>Booking Details</h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Booking ID</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['ID'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Cab Provider</h4>
                            </div>
                            <div class="col-xs-8 text-right payment">
                                <h4><?php echo "<p>Company: ".$provider['CompanyName'] ."</p>";
										  echo "<p>".$provider['StreetAddress']."</p>";
										  echo "<p>".$provider['ContactNumber']."</p>"; ?> </h4>
                            </div>
                        </div>
                        <?php if($booking['IsRound'] == 1){?>
						<div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Return Cab Provider</h4>
                            </div>
                            <div class="col-xs-8 text-right payment">
                                <h4><?php echo "<p>Company: ".$provider2['CompanyName'] ."</p>";
										  echo "<p>".$provider2['StreetAddress']."</p>";
										  echo "<p>".$provider2['ContactNumber']."</p>"; ?></h4>
                            </div>
                        </div>	
						<?php } ?>
                        
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">From Location</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['FromLoc'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">To Location</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['ToLoc'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Pick up Date</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['StartDateTime'] ?></h4>
                            </div>
                        </div>
                        <?php if($booking['IsRound'] == 1){?>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Drop Date</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['EndDateTime'] ?></h4>
                            </div>
                        </div>
                        <?php }?>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Passenger</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['Passanger'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Luggage</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['Luggage'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text">Needed Car</h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><?php echo $booking['NeededCar'] ?></h4>
                            </div>
                        </div>
                        <div class="row card-content">
                            <div class="col-xs-4 text-left">
                                <h4 class="gray-text"><strong>Total Fare</strong></h4>
                            </div>
                            <div class="col-xs-8 text-right">
                                <h4><strong><?php echo CURRENCY.$booking['TotalFare'] ?></strong></h4>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section><?php */?>

</div>