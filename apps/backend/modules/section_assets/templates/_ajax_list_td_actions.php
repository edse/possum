<td>
<ul class="sf_admin_td_actions">
    <li class="sf_admin_action_edit">
    	<a href="<?php echo url_for('homepage')?>asset/<?php echo $asset->getId()?>/edit">Edit</a>
    </li>
    <li class="sf_admin_action_delete">
    	<a href="javascript:;" onclick="deleteSectionAssets(<?php echo $asset->getId()?>, <?php echo $asset->getSectionId()?>);">Delete</a>
    </li>
</ul>
</td>