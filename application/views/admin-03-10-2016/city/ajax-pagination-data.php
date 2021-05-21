<?php if(!empty($providers)): foreach($providers as $provider): ?>
                                
    <tr class="odd gradeX">
        <td class="checktd">
        <input type="checkbox" name="ids[]" value="<?= $provider['ID'] ?>" class="checkbox" form="multidelete" />
        </td>
        <td><?= $provider['CityName'] ?> </td>
        <td><?= $provider['countryName'] ?> </td>
        <td>
            <a href="<?= base_url('admin/city/edit/').$provider['ID'] ?>" title="Update"><span class="glyphicon glyphicon-pencil"></span></a> 
            <a href="<?= base_url('admin/city/remove/').$provider['ID'] ?>" title="Reset" onclick="javascript:return confirm('Are you sure you want to delete this item?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    
<?php endforeach; else: ?>
	<tr class="odd gradeX">
        <td colspan="7">
            <p>City(s) not available.</p>
        </td>    
    </tr>
<?php endif; ?>

    <tr class="odd gradeX">
        <td colspan="8">
            <?php echo $this->ajax_pagination->create_links(); ?>
        </td>    
    </tr>


