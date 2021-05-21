<?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
    <tr class="odd gradeX">
        <td class="checktd">
        	<input type="checkbox" name="bid[]" value="<?= $provider['ID'] ?>" class="checkbox" form="deletebooking" />
        </td>
        <td><?= $provider['FirstName'] ." ". $provider['LastName'] ?> </td>
        <td><?= $provider['Email'] ?> </td>
        <td><?= $provider['Contact'] ?> </td>
        <td><?php 
					if($b['Status'] == 'Completed')
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
					} 
					echo $b['Status']; ?>
		</td>
        <td>
        	<a href="<?= base_url('admin/'.$this->comman_class.'/view/').$provider['ID'] ?>" title="View"><span class="glyphicon glyphicon-eye-open"></span></a> 
            <a href="<?= base_url('admin/'.$this->comman_class.'/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
            <a href="<?= base_url('admin/'.$this->comman_class.'/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
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


