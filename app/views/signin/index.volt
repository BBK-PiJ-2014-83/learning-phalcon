{% extends "templates/base.volt" %}
{% block head %}
	{{ this.assets.outputCss('additional') }}
{% endblock %}
{% block content %}
	<form class="form-signin" method="POST" action="{{ url('signin/doSignin') }}">
		<h2 class="form-signin-heading">Please sign in</h2>
		<label for="inputEmail" class="sr-only">Email address</label>
		<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
		<!--
		<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me"> Remember me
			</label>
		</div>
		-->
		<input type="hidden" name="{{ security.getTokenKey() }}" value ="{{ security.getToken() }}" />
		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign in" />
	</form>	
{% endblock %}
