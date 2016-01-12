<h1>User</h1>

<?php if (property_exists($single, 'id')):?>
	<p>Id: 	<?=$single->id?></p>
	<p>Email: <?=$single->email?></p>
	<?php print_r($single->getProject('id != 2')->toArray());?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($single->project as $project): ?>
			<tr>
				<td><?=$project->id?></td>				
				<td><?=$project->title?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif;?>
<hr/>
<?php foreach($all as $user): ?>
	<p>Id: 	<?=$user->id?></p>
	<p>Email: <?=$user->email?></p>
<?php endforeach ?>

