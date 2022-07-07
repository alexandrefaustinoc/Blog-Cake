<h1>Usuarios</h1>
<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>
<table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Função</th>
        <th>Created</th>
        <th> </th>
    </tr>

    <!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user) : ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td>
                <?php
                echo $user['User']['username'] ?>
            </td>
            <td>
                <?php
                echo $user['User']['role'] ?>
            </td>
            <td>
                <?php echo $user['User']['created']; ?>
            </td>
            <td>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?')
                );
                ?>
                <?php
                echo $this->Html->link(
                    'Edit',
                    array('action' => 'edit', $user['User']['id'])
                );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
