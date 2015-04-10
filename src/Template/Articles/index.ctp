<h1>Blog articles</h1>
<?php echo $this->Html->link('Add Article', array('action' => 'add')) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo $article->id ?></td>
            <td>
                <?php echo $this->Html->link($article->title, array('action' => 'view', $article->id)) ?>
            </td>
            <td>
                <?php echo $article->created->format(DATE_RFC850) ?>
            </td>
            <td>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $article->id)) ?> | 
                <?php echo $this->Form->postLink('Delete',['action' => 'delete', $article->id],['confirm' => 'Are you sure?']);?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>