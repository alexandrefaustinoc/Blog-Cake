<div class="add">
<?php
    echo '<h2 class ="title">Adicionar Postagem</h2>';
$addpost = $this->Form->create('Post', array('class' => 'post'));
$addpost .= $this->Form->input('title', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Title'));
$addpost .= $this->Form->input('body', array('rows' => '5', 'class' => 'form-control'));
$addpost .= $this->Form->input('ativo',  array('type' => 'checkbox', 'value'=>"Ativo"));
$addpost .= $this->Form->button('Salvar', array('type' => 'submit', 'class' => 'salvar'));
$addpost .= $this->Form->end(); 
echo $addpost;
?>
</div>
<style>
.add{
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