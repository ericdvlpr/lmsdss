<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
       <?php if($_SESSION['access'] == 1){?>   
          <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="authors.php">Authors</a></li>
            <li><a href="books.php">Books</a></li>
            <li><a href="catalogue.php">Category</a></li>
            <li><a href="faculty.php">Faculty</a></li>
            <li><a href="issuebook.php">Issue Book</a></li>
            <li><a href="#">Requisitions</a></li>
            <li><a href="#">Reservation</a></li>
            <li><a href="students.php">Students</a></li>
            <li><a href="users.php">Users</a></li>
          </ul>
       <?php }elseif (($_SESSION['access'] == 2)|| ($_SESSION['access'] == 3)  ) {?>
           <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
           <li><a href="authors.php">Authors</a></li>
           <li><a href="books.php">Books</a></li>
           <li><a href="catalogue.php">Category</a></li>
          <li><a href="issuebook.php">Issue Book</a></li>
       <?php }elseif ($_SESSION['access'] == 4) { ?> 
       <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
           <li><a href="requestBook.php">Request for Book</a></li>
            
      <?php } ?>  
          <!-- <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul> -->
        </div>