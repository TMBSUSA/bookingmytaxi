<?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
    <tr class="odd gradeX">
        <td class="checktd">
        	<input type="checkbox" name="ids[]" value="<?= $provider['ID'] ?>" class="checkbox" form="multidelete" />
        </td>
        <td><?= $provider['CompanyName']."<br><br><br>" ?>
			<?php if($provider['StripeVerification'] != ''){
                        if($provider['StripeVerification'] == 'verified')
                        {
                            echo "<i class='fa fa-check text-success' aria-hidden='true'></i> Stripe: Verified"; 
                        }
                        elseif($provider['StripeVerification'] == 'pending')
                        {
                            echo "<i class='fa fa-clock-o text-warning' aria-hidden='true'></i> Stripe: Pending";
                        }
                        elseif($provider['StripeVerification'] == 'unverified')
                        {
                            echo "<i class='fa fa-close text-danger' aria-hidden='true'></i> Stripe: Unverified";
                        }
                  }else{
                        echo "<span class='text-danger'>Bank detail not added</span>";
                  }
            ?>		 
        </td>
        <td><?= "Name: ".$provider['ContactPerson']."<br>" ?> 
			<?= "Number: ".$provider['ContactNumber']."<br>" ?> 
            <?= "Email: ".$provider['Email']."<br>" ?> 
            <?= "City: ".$provider['CityName']."<br>" ?> 
        </td>
        <td><?= convert_date($provider['ContractStartDate']). " To " .convert_date($provider['ContractEndDate']) ?> </td>
        <td><?php if($provider['RatePerMin'] != ''){
                      echo $provider['RatePerMin']."/Min<br>";
                  }
                  if($provider['RatePerMile'] != ''){
                      echo $provider['RatePerMile']."/Mile";
                  }?> 
        </td>
        <td><?= $provider['AvgRating'] ?> </td>
        <td>
            <a href="<?= base_url('admin/providers/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
            <a href="<?= base_url('admin/providers/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    
<?php endforeach; else: ?>
	<tr class="odd gradeX">
        <td colspan="10">
            <p>Provider(s) not available.</p>
        </td>    
    </tr>
<?php endif; ?>

    <tr class="odd gradeX">
        <td colspan="10">
            <?php echo $this->ajax_pagination->create_links(); ?>
        </td>    
    </tr>


