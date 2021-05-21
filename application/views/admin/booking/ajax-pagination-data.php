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
 	$return_company_details = $this->ci_model->get_company_details($b['ID']);
	
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
	<tr class="odd gradeX">
        <td colspan="10">
            <p><?= $this->title ?>(s) not available.</p>
        </td>    
    </tr>
<?php endif; ?>

    <tr class="odd gradeX">
        <td colspan="10">
            <?php echo $this->ajax_pagination->create_links(); ?>
        </td>    
    </tr>


