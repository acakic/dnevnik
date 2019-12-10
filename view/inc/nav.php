<nav>
	<ul>
		<li><a href="">Pocetna</a></li>
		<?php if (isset($_SESSION['rola'])): ?>
			<li><a href="/$_SESSION['rola']['rola_description']/logout">logout</a></li>			
		<?php endif ?>
	</ul>
</nav>
