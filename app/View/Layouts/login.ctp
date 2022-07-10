<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Login Blog</title>
    <!-- Bootstrap core CSS -->
    <?php
    echo $this->Html->css('login.css')
    ?>

</head>

<body>
    <main role="main" class="container" id="content">
        <?php
        echo $this->Flash->render();
        echo $this->fetch('content');
        ?>
    </main>
</body>
</html>