a:5:{i:0;s:287:"<!doctype html>
<html lang="en">
	<head>
		<?php echo $this->tag->getTitle(); ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php echo $this->assets->outputCss('style'); ?>
		<?php echo $this->assets->outputJs('js'); ?>
		";s:4:"head";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:5:" 
		";s:4:"file";s:37:"../app/views/templates/dashboard.volt";s:4:"line";i:10;}}i:1;s:1146:"		
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
						<li class="active"><a href="<?php echo $this->url->get('dashboard/'); ?>">Dashboard</a></li>
						<li><a href="<?php echo $this->url->get('projects/'); ?>">Projects</a></li>
						<li><a href="<?php echo $this->url->get('account/'); ?>">Account</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo $this->url->get('index/signout/'); ?>">Sign Out</a></li>
					</ul>
				</div>
			 </div>		
		</div>

		<?php echo $this->flash->output(); ?>
		";s:7:"content";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:4:"
		";s:4:"file";s:37:"../app/views/templates/dashboard.volt";s:4:"line";i:39;}}i:2;s:24:"			
	</body>
</html>
";}