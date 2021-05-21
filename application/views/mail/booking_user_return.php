<!doctype html>
<html>
  <body class='' style='font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: #f6f6f6; margin: 0; padding: 0;'>
    <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;' width='100%' bgcolor='#f6f6f6'>
      <tr>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
        <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto !important; width: 100%;' valign='top'>
          <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'>

            <!-- START CENTERED WHITE CONTAINER -->
            
            <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #fff; border-radius: 3px;' width='100%'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                  <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                    <tr>
                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hi <?php echo $UserName ?>,</p>
                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>
				You have successfully booked a taxi from BookingMyTaxi.<br />
				Please find below the details:
				</p>
				<table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;' width='100%'>
				  <tbody>
					<tr>
					  <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
						<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                          <tbody>
							<tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Booking ID
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $BookingID ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Cab Details
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $provider2['CompanyName'] ." - ". $provider2['ContactNumber'] ."<br />"; 
							  		echo $provider2['StreetAddress'] ?>
							  </td>
							</tr>
							<tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Pick Up location
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $ToLoc ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Drop Off Location
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $FromLoc ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Pickup
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $EndDateTime ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Number of Passengers
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $Passanger ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Number of Luggage
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $Luggage ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Number of Cars
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo $NeededCar ?>
							  </td>
							</tr>
                            <tr>
							  <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:right"> 
							  Total Fare
							  </td>
                              <td style="font-family: sans-serif; font-size: 14px; padding: 5px 10px; text-align:left "> 
							  <?php echo CURRENCY.$TotalFare ?>
							  </td>
							</tr>
                            
						  </tbody>
						</table>
					  </td>
					</tr>
				  </tbody>
				</table>
                
                <p>In case of any questions you can reach out to us at +4401392430207 or admin@bookingmytaxi.com.</p>
                
                <p>
                Thanks,<br />
                Customer Support<br />
                BookingMyTaxi
                </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
              </table>

            <!-- START FOOTER -->
            <div class='footer' style='clear: both; padding-top: 10px; text-align: center; width: 100%;'>
              <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                <tr>
                  <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;' valign='top' align='center'>
                    Powered by <a href='<?php echo base_url(); ?>' style='color: #999999; font-size: 12px; text-align: center; text-decoration: none;'><?php echo TITLE; ?></a>.
                  </td>
                </tr>
              </table>
            </div>

            <!-- END FOOTER -->
            
<!-- END CENTERED WHITE CONTAINER --></div>
        </td>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>