<!doctype html>
<html lang="en">
	<head>
		<?php echo $this->tag->getTitle(); ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo $this->assets->outputCss('style'); ?>
		<?php echo $this->assets->outputJs('js'); ?>
		 
				
	</head>
	<body>
		<div class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            		<span class="sr-only">Toggle navigation</span>
	          			<span class="icon-bar"></span>
	           			<span class="icon-bar"></span>
	           			<span class="icon-bar"></span>
	          		</button>
	          		<a class="navbar-brand" href="#">Fireball</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo $this->url->get('signin/'); ?>">Sign In</a></li>
					</ul>
				</div>
			 </div>		
		</div>

		<?php echo $this->flash->output(); ?>
		
	<div class="jumbotron">
		<h1>Fireball</h1>
		<p>
			This is a story about a fireball
		</p>
	</div>
			
	</body>
</html>
