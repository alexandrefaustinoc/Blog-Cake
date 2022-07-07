<h1>Posts</h1>
<p><?php
echo $this->Html->image('plus-solid.svg',array('class' => 'glyphicon glyphicon-plus', 'id' => 'icone', 'title' => 'Adicionar Post', 'url' => array('action' => 'add')));
?></p>

<?php
$filtro = $this->Form->create('Post', array('class' => 'form-inline',));
$filtro .= $this->Form->input('Post.title', array(
    'required' => false,
    'label' => array('text' => 'title', 'class' => 'sr-only'),
    'class' => 'form-control',
    'div' => false,
    'placeholder' => 'Title'

));
//Filtor data
$filtro .= $this->Form->input('Post.created', array(
    'required' => false,
    'label' => array('text' => 'data', 'class' => 'sr-only'),
    'data-provide' => 'datepicker',
    'class' => 'form-control',
    'div' => false,
    'type' => 'text', 'id' => 'filtrar_data',
    'placeholder' => 'Date'
));
$filtro .= $this->Form->button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-default'));
$filtro .= $this->Form->end();
echo $filtro;
?>
<table class="table table-hover">
    <tr>
        <th class="text-center">Id</th>
        <th class="text-center">Titulo</th>
        <th class="text-center">Usuario</th>
        <th class="text-center">Data de Criação</th>
        <th class="text-center">Editar</th>
        <th class="text-center">Deletar</th>
        <th class="text-center">Status</th>
    </tr>
    <!-- Here's where we loop through our $posts array, printing out post info -->
    <?
       
    ?>

    <?php foreach ($posts as $collapse => $post) : ?>
        <tr>
            <td class="text-center">
                <?php echo $post['Post']['id'] ?>
            </td>
            <td>
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#<? echo $collapse ?>">
                            <?php echo $post['Post']['title']; ?>
                        </a>
                        <div id="<? echo $collapse ?>" class="panel-collapse collapse">
                            <h1><?php echo h($post['Post']['title']); ?></h1>
                            <p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
                            <p><?php echo h($post['Post']['body']); ?></p>
                        </div>
                    </h4>
                </div>
            </td>
            <td class="text-center">
                <?php
                echo $post['Post']['user_id']
                ?>
            </td>
            <td class="text-center">
                <?php echo date('d/m/Y', strtotime($post['Post']['created'])) ?>
            </td>
            <td class="text-center">
                <?php
                echo $this->Html->image('pen-to-square-solid.svg', array('class' => 'glyphicon glyphicon-edit', 'id' => 'icones', 'title' => 'Editar', 'url' => array('action' => 'edit', $post['Post']['id'])));
                ?>
            </td>
            <td class="text-center">
                <?php
                echo $this->Form->postLink(
                    $this->Html->image('trash-can.svg', array('class' => 'glyphicon glyphicon-trash', 'title' => 'Excluir')) . " ",
                    array('action' => 'delete', $post['Post']['id']),
                    array('escape' => false),
                    __('Are you sure you want to delete # %s?', $post['Post']['id']),
                    array('class' => 'btn btn-mini')
                );
                ?>
            </td>
            <td class="text-center">
                <?php
                    if ($post['Post']['status'] == true) {
                        print_r('Ativo');
                    } else {
                        print_r('Inativo');
                    }
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<script type="text/javascript">
    $('#filtrar_data').datepicker({
        language: "pt-BR",
        format: "yyyy/mm/dd",
        todayBtn: "linked",
        orientation: "bottom right",
        autoclose: true,
        todayHighlight: true
    });
</script>