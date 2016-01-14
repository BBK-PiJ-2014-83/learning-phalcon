<h1>User</h1>

<h2>List</h2>
{{ form('user/login/?demo=555', 'method': 'post') }}
	Username : {{ text_field('username')}}
	Password : {{ password_field('password')}}
	{{ submit_button('Login')}}
{% if single %}
	<p>Id: 	{{single.id}}</p>
	<p>Email: {{single.email}}</p>
	<hr/>
	{% set first=single.project.getFirst().toArray() %}
	{{first['id']}}
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
			</tr>
		</thead>
		<tbody>
			{% for key, project in single.project %}
			<tr>
				<td>{{ project.id }}</td>				
				<td>{{ project.title }}</td>
			</tr>
			{% endfor %}
		</tbody>
	</table>
{% endif %}
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
	{% for key,user in all%}
		<tr>
			<td>{{ key }}</td>
			<td>{{ user.id }}</td>
			<td>{{ user.email }}</td>
		</tr>
	{% endfor %}
	</tbody>
</table>

