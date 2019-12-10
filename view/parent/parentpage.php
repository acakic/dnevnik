<?php var_dump($_SESSION['user']); ?>
<?php var_dump($_SESSION['student']); ?>
<h1>Dobrodosli <?php echo $_SESSION['user']['first_name'] .' ' .$_SESSION['user']['last_name'];  ?></h1>

<h2><a href="#"><?php echo $_SESSION['student']['first_name'] .' '. $_SESSION['student']['last_name']; ?></a> <a href="#"> <?php echo $_SESSION['student']['class_grade'];  ?> razred</a></h2>
