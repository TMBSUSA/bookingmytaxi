<script>
history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
	window.location.href = <?php echo base_url()?>;
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
    
    <section id="search-results" class="content-section search-results">
    	<div class="container-fluid">
            <div class="col-md-8">
            	<div class="card">
                    <?php /*?><div class="row">
                    	<div class="col-sm-12 text-left card-header">
                        	<h4>Results <span class="search-count">Showing 20 of 53</span></h4>
                        </div>
                    </div><?php */?>
                    
                    <?php 
					if($trip == 'round'){?>
                    <ul class="nav nav-tabs nav-tabs1" role="tablist">
                        <li role="presentation" class="active"><a href="#tab1" class="tabs1 step_one" aria-controls="home" role="tab" data-toggle="tab">Going out</a></li>
                        <li role="presentation"><a href="#tab2" class="tab2 tabs1 step_two" aria-controls="profile" role="tab" data-toggle="tab">Return</a></li>
                  	</ul>
                    <?php }?>
					<div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab1">
                        	<?php 
					if(count($providers) > 0)
					{
						$star = "<i class='zmdi zmdi-star star-rating'></i>";
						foreach($providers as $provider)
						{ ?>
					<form class="form-horizontal" method="post" action="<?= base_url('booking_detail') ?>">
                    <div class="row card-content">
                    	<div class="col-sm-3 col-xs-6 text-left">
                        	<h4>Cab Provider</h4>
                            <p><i class="glyphicon glyphicon-map-marker"></i> <?= $provider['CityName'] ?></p>
                        </div>
                    	<div class="col-sm-3 col-xs-6 text-left hidden-xs">
                   	    	<?php for($i=0;$i<$provider['AvgRating'];$i++){
									  echo $star;
								  } ?>
                        </div>
                    	<div class="col-sm-3 col-xs-6 text-right">
                        	<h4 class="offer-price">
                            	<!--<span class="sale-bedge">sale</span>-->
<?php 
	$BaseCost 	  = $provider['BaseCost']; //echo "<br />";
	$DistanceRate = $finaldistance * $provider['RatePerMile']; //echo "<br />";
	$DurationRate = $finalduration * $provider['RatePerMin']; //echo "<br />";
	
	$Fare = $BaseCost + $DistanceRate + $DurationRate; //echo "<br />";
	// multiply fare with NeededCar	
	$Fare = $Fare * $NeededCar;
	
	$CommissionOnFare = ($Fare * $commission) / 100; //echo "<br />";
	$TotalFare = $Fare + $CommissionOnFare;
	echo CURRENCY . round($TotalFare,2);
?>                            
                            </h4>
<?php echo "<p>$NeededCar Car needed</p>"; ?>                            
                            <!--<p><span class="offer-price">-10% off!</span> <span class="old-price">£38.85</span> Card only</p>-->
                        </div>
                    	<div class="col-sm-3 col-xs-6 visible-xs">
                   	    	<?php for($i=0;$i>$provider['AvgRating'];$i++){
									  echo $star;
								  } ?>
                        </div>
                    	<div class="col-sm-3 col-xs-6">
                        	<?php if($trip == 'single'){ ?>
                            <button type="submit" class="btn btn-block btn-yellow">Select <i class="glyphicon glyphicon-menu-right"></i></button>
                            <?php }else{ ?>
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-yellow" onclick="next_step(<?= $provider['ID'] ?>)">Select <i class="glyphicon glyphicon-menu-right" ></i></button>
                            <?php } ?>
                        </div>
                    </div>
                    <?php 
					if($trip == 'round'){?>
                    <div class="hidden-value-<?= $provider['ID'] ?>">
                        <input type="hidden" name="PID" value="<?= $provider['ID'] ?>"  />
                        <input type="hidden" name="Fare" value="<?= $Fare ?>"  />
                        <input type="hidden" name="Commission" value="<?= $commission ?>"  />
                        <input type="hidden" name="CommissionOnFare" value="<?= $CommissionOnFare ?>"  />
                        <input type="hidden" name="TotalFare" value="<?= $TotalFare ?>"  />	
                        <input type="hidden" name="NeededCar" value="<?= $NeededCar ?>"  />	
                        
                        <input type="hidden" name="from_loc" value="<?= $from_loc ?>"  />
                        <input type="hidden" name="to_loc" value="<?= $to_loc ?>"  />
                        <input type="hidden" name="via" value="<?= $via ?>"  />
                        <input type="hidden" name="from_lat" value="<?= $from_lat ?>" id="from_lat"  />
                        <input type="hidden" name="from_lng" value="<?= $from_lng ?>" id="from_lng"  />
                        <input type="hidden" name="to_lat" value="<?= $to_lat ?>" id="to_lat"  />
                        <input type="hidden" name="to_lng" value="<?= $to_lng ?>" id="to_lng"  />
                        <input type="hidden" name="trip" value="<?= $trip ?>" id="trip"  />
                        <input type="hidden" name="pickup" value="<?= $pickup ?>" id="pickup"  />
                        <input type="hidden" name="drop" value="<?= $drop ?>" id="drop"  />
                        <input type="hidden" name="passenger" value="<?= $passenger ?>" id="passenger"  />
                        <input type="hidden" name="luggage" value="<?= $luggage ?>" id="luggage"  />
                        <input type="hidden" name="going_out_end" value="<?= $going_out_end ?>" id="going_out_end"  />
                        <input type="hidden" name="ReturnEnd" value="<?= $ReturnEnd ?>" id="ReturnEnd"  />
                    </div>
                    <?php }else{ ?>
						<input type="hidden" name="PID" value="<?= $provider['ID'] ?>"  />
                        <input type="hidden" name="Fare" value="<?= $Fare ?>"  />
                        <input type="hidden" name="Commission" value="<?= $commission ?>"  />
                        <input type="hidden" name="CommissionOnFare" value="<?= $CommissionOnFare ?>"  />
                        <input type="hidden" name="TotalFare" value="<?= $TotalFare ?>"  />	
                        <input type="hidden" name="NeededCar" value="<?= $NeededCar ?>"  />	
                        
                        <input type="hidden" name="from_loc" value="<?= $from_loc ?>"  />
                        <input type="hidden" name="to_loc" value="<?= $to_loc ?>"  />
                        <input type="hidden" name="from_lat" value="<?= $from_lat ?>" id="from_lat"  />
                        <input type="hidden" name="from_lng" value="<?= $from_lng ?>" id="from_lng"  />
                        <input type="hidden" name="to_lat" value="<?= $to_lat ?>" id="to_lat"  />
                        <input type="hidden" name="to_lng" value="<?= $to_lng ?>" id="to_lng"  />
                        <input type="hidden" name="via" value="<?= $via ?>"  />
                        <input type="hidden" name="trip" value="<?= $trip ?>" id="trip"  />
                        <input type="hidden" name="pickup" value="<?= $pickup ?>" id="pickup"  />
                        <input type="hidden" name="drop" value="<?= $drop ?>" id="drop"  />
                        <input type="hidden" name="passenger" value="<?= $passenger ?>" id="passenger"  />
                        <input type="hidden" name="luggage" value="<?= $luggage ?>" id="luggage"  />
                        <input type="hidden" name="going_out_end" value="<?= $going_out_end ?>" id="going_out_end"  />
					<?php }?>
                    </form>
					<?php } 
					}else{?>
						<div class="blank-space text-center">
                        <img src="<?php echo base_url('front/imgs/transport.svg') ?>" class="center-block" alt=""/>
	                    <p class="text-center">No Search results found.</p>
                        <a href="<?php echo base_url() ?>" class="btn btn-yellow">Try Again</a>
                    </div>
					<?php }?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tab2">
                        
                        <?php 
				if($trip == 'round')
				{						
					if(count($return_providers) > 0)
					{
						foreach($return_providers as $provider){ 
						$star = "<i class='zmdi zmdi-star star-rating'></i>";
					?>
					<form class="form-horizontal" method="post" action="<?= base_url('booking_detail') ?>">
                    <div class="row card-content">
                    	<div class="col-sm-3 col-xs-6 text-left">
                        	<h4>Cab Provider</h4>
                            <p><i class="glyphicon glyphicon-map-marker"></i> <?= $provider['CityName'] ?></p>
                        </div>
                    	<div class="col-sm-3 col-xs-6 hidden-xs">
                   	    	<?php for($i=0;$i<$provider['AvgRating'];$i++){
									  echo $star;
								  } ?>
                        </div>
                    	<div class="col-sm-3 col-xs-6 text-right">
                        	<h4 class="offer-price">
                            	<!--<span class="sale-bedge">sale</span>-->
<?php 
	$BaseCost 	  = $provider['BaseCost'];
	$DistanceRate = $finaldistance * $provider['RatePerMile'];
	$DurationRate = $finalduration * $provider['RatePerMin'];
	
	$Fare = $BaseCost + $DistanceRate + $DurationRate;
	// multiply fare with NeededCar	
	$Fare = $Fare * $NeededCar;
	
	$CommissionOnFare = ($Fare * $commission) / 100;
	$TotalFare = $Fare + $CommissionOnFare;
	echo CURRENCY ." ". $TotalFare;
?>                            
                            </h4>
<?php echo "<p>$NeededCar Car needed</p>"; ?>                            
                            <!--<p><span class="offer-price">-10% off!</span> <span class="old-price">£38.85</span> Card only</p>-->
                        </div>
                    	<div class="col-sm-3 col-xs-6 visible-xs">
                   	    	<?php for($i=0;$i>$provider['AvgRating'];$i++){
									  echo $star;
								  } ?>
                        </div>
                    	<div class="col-sm-3 col-xs-6">
                        	<button type="submit" class="btn btn-block btn-yellow">Select <i class="glyphicon glyphicon-menu-right"></i></button>
                        </div>
                    </div>
                    
                    
                    <input type="hidden" name="PID2" value="<?= $provider['ID'] ?>"  />
                    <input type="hidden" name="Fare2" value="<?= $Fare ?>"  />
                    <input type="hidden" name="Commission2" value="<?= $commission ?>"  />
                    <input type="hidden" name="CommissionOnFare2" value="<?= $CommissionOnFare ?>"  />
                    <input type="hidden" name="TotalFare2" value="<?= $TotalFare ?>"  />	
                    <input type="hidden" name="NeededCar2" value="<?= $NeededCar ?>"  />	
                    
                    <input type="hidden" name="from_loc2" value="<?= $from_loc ?>"  />
                    <input type="hidden" name="to_loc2" value="<?= $to_loc ?>"  />
                    <input type="hidden" name="via2" value="<?= $via ?>"  />
                    <input type="hidden" id="trip" name="trip2" value="<?= $trip ?>"  />
                    <input type="hidden" id="pickup" name="pickup2" value="<?= $pickup ?>"  />
                    <input type="hidden" id="drop" name="drop2" value="<?= $drop ?>"  />
                    <input type="hidden" id="passenger" name="passenger2" value="<?= $passenger ?>"  />
                    <input type="hidden" id="luggage" name="luggage2" value="<?= $luggage ?>"  />
                    <div class="set-hidden">
                    </div>
                    </form>
                    
					<?php } 
					}else{?>
						<div class="blank-space text-center">
                        <img src="<?php echo base_url('front/imgs/transport.svg') ?>" class="center-block" alt=""/>
	                    <p class="text-center">No Search results found.</p>
                        <a href="<?php echo base_url() ?>" class="btn btn-yellow">Try Again</a>
                    </div>
					<?php }
				}?>
                        
                        </div>
                   	</div>
                    
                    
                	
                    
                </div>
            </div>
        	<div class="col-md-4 sidecard">
                <form id="booking" class="form-horizontal" method="post" action="<?= base_url('search') ?>" onsubmit="return ValidationEvent()" >
                
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn active">
                    <input type="radio" name="trip" value="single" <?php if($trip == 'single'){ echo "checked"; }?> ><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i> <span>  Single Trip</span>
                    </label>
                    <label class="btn">
                    <input type="radio" class="isround" name="trip" value="round" <?php if($trip == 'round'){ echo "checked"; }?>><i class="fa fa-circle-o fa-2x"></i><i class="fa fa-dot-circle-o fa-2x"></i><span> Round Trip</span>
                    </label>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-yellow via_btn">
                      <span class="glyphicon glyphicon-plus"></span> Via
                    </button>
                </div>
                <div class="form-group">
                    <p><strong>Pick up location</strong></p>
                    <div class="col-md-12">
                    	<input id="from_loc" name="from_loc" type="text" value="<?= $from_loc ?>" class="form-control input-md" onchange="doGeocode(this)">
                    </div>
                </div>
                
                <div class="form-group via">
                    <p><strong>Via Location</strong></p>
                    <div class="col-md-12">
                        <div class="input-group">
                          <input id="via" name="via" type="text" value="<?= $via ?>" class="form-control input-md" onchange="doGeocode(this)" >
                          <span class="input-group-btn">
                            <button class="via_close btn btn-default" type="button">X</button>
                          </span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <p><strong>Drop off location</strong></p>
                    <div class="col-md-12">
                    	<input id="to_loc" name="to_loc" type="text" value="<?= $to_loc ?>" class="form-control input-md" onchange="doGeocode(this)" >
                    </div>
                </div>
                
                <div class="form-group">
                 	<div class="col-md-6">
                    	<label>Pick up time</label>
                        <input name="pickup" type="text" value="<?= $pickup ?>" class="form-control input-md datetimepicker datetimepicker-fix" readonly>
                    </div>
                    <div class="col-md-6 drop_time">
                    	<label>Return Pick up time</label>
                    	<input name="drop" type="text" value="<?= $drop ?>" class="form-control input-md dropdatetimepicker datetimepicker-fix" readonly>
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                      <label>Passenger</label>
                  	  <?php /*?><input id="" name="passenger" type="text" value="<?= $passenger ?>" class="form-control input-md"><?php */?>
                      <select name="passenger" class="form-control">
                        <option selected disabled>Passenger</option>
                        <option value="1" <?php if('1' == $passenger){ echo "selected";} ?> >1 Passenger</option>
                        <?php for($i=2;$i<=16;$i++){ ?>
                        <option value="<?=$i?>" <?php if($i == $passenger){ echo "selected";} ?> ><?=$i?> Passengers</option>
                        <?php }?>
                      </select>
                  </div>
                  <div class="col-md-6">
                    <label>Luggage</label>
                   	<select name="luggage" class="form-control"><!--class=Luggage-->
                        <option disabled>Luggage</option>
                        <option value="0" selected>None</option>
                        <option value="1" <?php if('1' == $luggage){ echo "selected";} ?>>1 Suitcase</option>
                        <?php for($i=2;$i<=16;$i++){ ?>
                        <option value="<?=$i?>" <?php if($i == $luggage){ echo "selected";} ?>><?=$i?> Suitcases</option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                  <div class="col-md-12">
                    <button type="submit" id="search" class="btn btn-yellow btn-block">Update Search</button>
                  </div>
                </div>
                <input type="hidden" id="MinEndDate" name="MinEndDate" value="<?= $MinEndDate ?>"  />
                <input type="hidden" id="from_lat" name="from_lat" value="<?= $from_lat ?>"  />
                <input type="hidden" id="from_lng" name="from_lng" value="<?= $from_lng ?>"  />
                <input type="hidden" id="to_lat" name="to_lat" value="<?= $to_lat ?>"  />
                <input type="hidden" id="to_lng" name="to_lng" value="<?= $to_lng ?>"  />
                <input type="hidden" id="finaldistance" name="finaldistance" value="<?= $finaldistance ?>"  />
                <input type="hidden" id="finalduration" name="finalduration" value="<?= $finalduration ?>"  />
                </form>
            </div>
        </div>
    	
    </section>

</div>
<style>
.datetimepicker{padding: 6px 8px !important;}
</style>