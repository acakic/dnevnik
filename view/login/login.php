			<!-- <h1>U LOGINU SAM</h1> -->
			<?php if (!isset($_SESSION['rola'])): ?>
				<div class="loginContainer">
					<!-- <img src="../../pictures/loginbac.jpg"> -->
					<form name="login_form" action="/login/loginuser" method="post">
						<label for="email">Email:</label>
						<input type="email" name="email" placeholder="Enter Email">

						<label for="password">Password:</label>
						<input type="password" name="password" placeholder="Enter Password">

						<input type="submit" name="submit" value="Login">
					</form>				
				</div>
			<?php else: ?>
				<a href="/login/logout">logout</a>
			<?php endif ?>

