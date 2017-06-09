<h3>Reviews</h3>
<table class="table table-striped">
    <?php foreach($data['reviews'] as $review) { ?>
    <tr>
        <td><?php if($review['image']) { ?><img class="media-object" src="<?= Router::uri($review['image']) ?>" alt=""><?php } ?></td>
        <td><b><small><?=$review['author']?></small></b></td>
        <td><small><?=$review['email']?></small></td>
        <td><small><?=substr($review['message'], 0, 100)?></small></td>
        <td><small><?=date('d-m-Y H:i', strtotime($review['created']))?></small></td>
        <td><small><?=! empty($review['is_approved']) ? 'approved' : 'unapproved'?></small></td>
        <td><small><?=! empty($review['is_modified']) ? 'modified by administrator' : ''?></small></td>
        <td align="right">
            <a href="<?= Router::uri('/admin/site/approve/') ?><?=$review['id']?>/<?=empty($review['is_approved']) ? 1 : 0?>"><button class="btn btn-sm btn-warning"><?=empty($review['is_approved']) ? 'Approve' : 'Unapprove'?></button></a>
        </td>
        <td align="right">
            <a href="<?= Router::uri('/admin/site/edit/' . $review['id']) ?>"><button class="btn btn-sm btn-primary">Edit</button></a>
        </td>
    </tr>
    <?php } ?>
</table>