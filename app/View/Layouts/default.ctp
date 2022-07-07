<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <title>Tutorial Blog</title>
    <!-- Bootstrap core CSS -->
	<?php
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('container.css');
	?>

  </head>

  <body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/posts">Home</a></li>
            <li><a href="/users">Usuarios</a></li>
            <li><a href="/posts">Posts</a></li>
          </ul>
	</nav>

	<main role="main" class="container" id="content">
			<?php 
			echo $this->Flash->render(); 
			echo $this->fetch('content'); 
			?>
	</main>
	<?php 
		echo $this->Html->script('jquery-3.6.0.min.js');
		echo $this->Html->script('bootstrap.min.js');
		echo $this->Js->writeBuffer();
	?>
  </body>
</html>
