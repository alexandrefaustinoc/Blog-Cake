
<div class="edit">
<?php
    echo '<h2 class ="title">Editar Postagem</h2>';
$editpost = $this->Form->create('Post', array('class' => 'post'));
$editpost .= $this->Form->input('title', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Title'));
$editpost .= $this->Form->input('body', array('rows' => '5', 'class' => 'form-control'));
$editpost .= $this->Form->input('id', array('type' => 'hidden'));
$editpost .= $this->Form->input('ativo', array('type' => 'checkbox', 'value'=>"Ativo"));
$editpost .= $this->Form->button('Salvar', array('type' => 'submit', 'class' => 'salvar'));
$editpost .= $this->Form->end(); 
echo $editpost;

?>
</div>
<style>
.edit{
    margin: auto ;
    margin-top: 50px;
    height: 500px;
}
.post{
    padding: 20px;
}
.title{
    text-align: center;
}
</style>