<?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
    <tr class="odd gradeX">
        <td class="checktd">
        <input type="checkbox" name="ids[]" value="<?= $provider['ID'] ?>" class="checkbox" form="multidelete" />
        </td>
        <td><?= $provider['FirstName'] ." ". $provider['LastName'] ?> </td>
        <td><?= $provider['Email'] ?> </td>
        <td><?= $provider['Contact'] ?> </td>
        <td><?= $provider['Status'] ?> </td>
        <td>
            <a href="<?= base_url('admin/user/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
            <a href="<?= base_url('admin/user/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
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


