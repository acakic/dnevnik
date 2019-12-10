	<div class="container">
		<h1>New student form</h1>
		
		<div class="registrateBox">
			<h1>Registrate Student</h1>
			<form action="http://dnevnik/administrator/userRegistration" method="post">
							
				<label for="first_name">First Name</label>
				<input type="text" name="first_name" placeholder="Enter First Name" value="">
							
				<label for="last_name">Last Name</label>
				<input type="text" name="last_name" placeholder="Enter Last Name" value="">

				<label for="id_class">Classroom</label>
				<input type="number" name="id_class" placeholder="Enter classroom">

				<label for="id_parent">Parent ID</label>
				<input type="number" name="id_parent" placeholder="Enter parent id">

				<label for="id_grade">Grade ID</label>
                <select name="id_grade">
                    <option value="1">Prvi</option>
                    <option value="2">Drugi</option>
                    <option value="3">Treci</option>
                    <option value="4">Cetvrti</option>
                    <option value="5">Peti</option>
                    <option value="6">Sesti</option>
                    <option value="7">Sedmi</option>
                    <option value="8">Osmi</option>
                </select>

				<input type="submit" name="registrate" value="Registrate">
			</form>
		</div>	<!-- registrateBox end -->
		<a class="" href="http://dnevnik/administrator/administratorpage">Go back</a>
	</div>