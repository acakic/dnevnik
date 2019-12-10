	<div class="container">
		<h1>New user form</h1>
		
		<div class="registrateBox">
			<h1>Registrate User</h1>
			<form action="http://dnevnik/administrator/registration" method="post">
							
				<label for="first_name">First Name</label>
				<input type="text" name="first_name" placeholder="Enter First Name" value="">	
							
				<label for="last_name">Last Name</label>
				<input type="text" name="last_name" placeholder="Enter Last Name" value="">

				<label for="email">E-mail</label>
				<input type="email" name="email" placeholder="johndoe@xmpl.com" value="">
	
				<label for="password">Password</label>
				<input type="password" name="password" placeholder="Enter Password">

				<label for="re_password">Re-Type Password</label>
				<input type="password" name="re_password" placeholder="Enter Password">

				<label for="role_id">Role</label>
                <select name="role_id">
                    <option value="1">Administrator</option>
                    <option value="2">Director</option>
                    <option value="3">Professor</option>
                    <option value="4">Teacher</option>
                    <option value="5">Parent</option>
                </select>
<!--				<input type="text" name="role_id" placeholder="Enter city name">-->

				<input type="submit" name="registrate" value="Registrate">
			</form>
		</div>	<!-- registrateBox end -->
		<a class="" href="http://dnevnik/administrator/administratorpage">Go back</a>
	</div>
