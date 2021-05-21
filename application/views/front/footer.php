<!-- About Section -->
    <section id="footer" class="content-section">
        <div class="container">
            <div class="row">
            	<div class="col-sm-6">
                	<div class="well">
                    	<h3>Register Your Taxi Business</h3>
                        <p>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget </p>
                        <a href="#x" class="btn btn-footer">Register Now</a>
                    </div>
                </div>
                <div class="col-sm-3">
                	<ul class="list-unstyled">
                    	<li><a href="#x">Home</a></li>
                    	<li><a href="#x">About us</a></li>
                    	<li><a href="#x">News</a></li>
                    	<li><a href="#x">Careers</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                	<ul class="list-unstyled">
                    	<li><a href="#x">Support</a></li>
                    	<li><a href="#x">Terms &amp; Conditions</a></li>
                    	<li><a href="#x">Privacy Policy</a></li>
                    	<li><a href="#x">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <section class="credits">
    	<div class="container">
        	<div class="row">
            	<p>&copy; <?= date('Y') ." ". TITLE ?> </p>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <?php	if(!isset($jquery))
			{ ?>
				<script src="<?= base_url('front/')?>js/jquery.js"></script>
	<?php 	} ?>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('front/')?>js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="<?= base_url('front/')?>js/jquery.easing.min.js"></script>
    <script src="<?= base_url('front/')?>js/moweb.js"></script>
	<?php
    	if(isset($js) && !empty($js))
		{
			foreach($js as $link)
			{
				echo $link;
			}
		}
	?>
   
<script>
$(document).ready(function() 
{
	
<?php if(isset($trip) && $trip=='round')
	  {?>
		$('.drop_time').show();	
<?php }
 	  if($this->session->userdata('user_logged_in'))
	  {?>
		get_user();	
<?php }?>

});

<?php if($this->uri->segment('1') == "search")
	  {?>
		var from_loc_flag = true;
		var to_loc_flag = true;
<?php }?>
</script>
<script>
/*$( document ).ready(function() 
//$("#search").click(function (e) 
{
	
	//e.preventDefault();
	debugger;
	if($("#from_loc").val() == '' || $("#to_loc").val() == '')
	{
		$('.extra_fields').fadeIn(2000);
		//$('#booking').submit();
		return false;
	}
	if($(".datetimepicker").val() == '')
	{
		
		return false;
		//$('#booking').submit();
	}
	
	if($("#from_loc").val() == $("#to_loc").val())
	{
		alert("Pick up & Drop off location should not be same");	
		$("#to_loc").focus();
		return false;
	}
	if($("#via").val() != '')
	{
		doGeocode('#from_loc');
		if($("#from_loc").val() == $("#via").val())
		{
			alert("Pick up & Via location should not be same");	
			$("#via").focus();
			return false;
		}   
		if($("#to_loc").val() == $("#via").val())
		{
			alert("Drop off & Via location should not be same");	
			$("#via").focus();
			return false;
		}
	}
	
	if (from_loc_flag == false) 
	{
		alert("Please enter valid from location");	
		return false;
	}
	if (to_loc_flag == false) 
	{
		alert("Please enter valid to location");	
		return false;
	}
	if (via_flag == false) 
	{
		alert("Please enter valid via location");	
		return false;
	}
	
    if ($('input[name=trip]:checked').val() == 'round') 
	{
		if($(".dropdatetimepicker").val() == '')
		{
			$('#booking').submit();
			return false;
		}
		
		var totime = $('.dropdatetimepicker').datetimepicker('getDate').getTime();
		var fixeddate = $('#MinEndDate').val();
		if(totime < parseInt(fixeddate)){
			alert("Please select valid drop time");	
			return false;	
		}	
		
		var startt = toDate($('.datetimepicker').val());
		var date = $('.dropdatetimepicker').val();
		var endt = toDate(date);
		
		if (startt > endt) 
		{
			alert("Please select greater return pickup time");	
			return false;
		}
    }
	
	
	/*if (!out) { event.preventDefault(); }
     return out;
	//$('#booking').submit();
	document.getElementById("booking").submit();
});

document.onkeydown=function(){
    if(window.event.keyCode=='13')
	{		
		$('.extra_fields').fadeIn(2000);
		$('#search').click();
    }
}*/
</script>
</body>
</html>