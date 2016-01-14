<h1>User</h1>

<h2>List</h2>
<?php echo $this->tag->form(array('user/login/?demo=555', 'method' => 'post')); ?>
	Username : <?php echo $this->tag->textField(array('username')); ?>
	Password : <?php echo $this->tag->passwordField(array('password')); ?>
	<?php echo $this->tag->submitButton(array('Login')); ?>
<?php if ($single) { ?>
	<p>Id: 	<?php echo $single->id; ?></p>
	<p>Email: <?php echo $single->email; ?></p>
	<hr/>
	<?php $first = $single->project->getFirst()->toArray(); ?>
	<?php echo $first['id']; ?>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($single->project as $key => $project) { ?>
			<tr>
				<td><?php echo $project->id; ?></td>				
				<td><?php echo $project->title; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } ?>
<hr/>
<h1>All users</h1>
<table>
	<thead>
		<tr>
			<th>Key</th>
			<th>UserId</th>			
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($all as $key => $user) { ?>
		<tr>
			<td><?php echo $key; ?></td>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->email; ?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>

