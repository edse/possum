<td colspan="9">
<ul class="sf_admin_td_actions">
    <li class="sf_admin_action_edit">
    	<a href="<?php echo url_for('homepage')?>sony_asset/<?php echo $asset->getId()?>/edit">Edit</a>
    </li>
    <li class="sf_admin_action_delete">
    	<a href="javascript:;" onclick="deleteCategoryAssets(<?php echo $asset->getId()?>, <?php echo $category->getId()?>);">Delete</a>
    </li>
</ul>
</td>
