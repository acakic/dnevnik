    <div class="container">
        <h1>ADMINISTRATOR PAGE</h1>
        <h1>Dobrodosli <?php echo $_SESSION['user']['first_name'] .' ' .$_SESSION['user']['last_name'];  ?></h1>
        <div>
            <a class="" href="http://dnevnik/administrator/newuserform">Add new user</a><br>
            <a class="" href="http://dnevnik/administrator/newstudentform">Add new student</a><br>
            <a class="" href="http://dnevnik/administrator/scheduleform">Create Schedule</a>
        </div>
    </div>
