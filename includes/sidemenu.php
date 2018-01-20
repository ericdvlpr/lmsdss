<div class="col-sm-3 col-md-2 ">
          <ul class="nav nav-sidebar sidebar">
       <?php if($_SESSION['access'] == 1){?>   
          <li class="active"><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="announcements.php"><i class="fa fa-clipboard"></i> Announcementss</a></li>
            <li><a href="authors.php"><i class="fa fa-pencil"></i> Authors</a></li>
            <li><a href="books.php"><i class="fa fa-book"></i> Books</a></li>
            <li><a href="catalogue.php"><i class="fa fa-tag"></i> Category</a></li>
            <li><a href="faculty.php"><i class="fa fa-user"></i> Faculty</a></li>
            <li><a href="issuebook.php"><i class="fa fa-download"></i> Issue Book</a></li>
            <li><a href="referrence.php"><i class="fa fa-upload"></i> Book Referrence</a></li>
            <li><a href="reservation.php"><i class="fa fa-folder"></i> Reservation</a></li>
            <li><a href="reports.php"><i class="fa fa-file"></i> Reports</a></li>
            <li><a href="students.php"><i class="fa fa-male"></i> Students</a></li>
            <li><a href="users.php"><i class="fa fa-users  "></i> Users</a></li>
          
       <?php }elseif (($_SESSION['access'] == 2)|| ($_SESSION['access'] == 3)  ) {?>
           <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
           <li><a href="authors.php">Authors</a></li>
           <li><a href="books.php">Books</a></li>
           <li><a href="catalogue.php">Category</a></li>
          <li><a href="issuebook.php">Issue Book</a></li>
       <?php }elseif ($_SESSION['access'] == 4) { ?> 
       <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
           <li><a href="requestBook.php">Request for Book</a></li>
            
      <?php }elseif($_SESSION['access'] == 5){?>  
       <li class="active"><a href="index.php">Overview <span class="sr-only">(current)</span></a></li>
      <li><a href="searchBook.php">Search Book</a></li>
      <li><a href="feedback.php">Give Us a FeedBack</a></li>
      <?php }else{
        ?>
<li class="active"><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> </span> Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="announcements.php"><i class="fa fa-clipboard"></i> Announcements</a></li>
            <li><a href="authors.php"><i class="fa fa-pencil"></i> Authors</a></li>
            <li><a href="books.php"><i class="fa fa-book"></i> Books</a></li>
            <li><a href="catalogue.php"><i class="fa fa-tag"></i> Category</a></li>
            <li><a href="faculty.php"><i class="fa fa-user"></i> Faculty</a></li>
            <li><a href="issuebook.php"><i class="fa fa-download"></i> Issue Book</a></li>
            <li><a href="referrence.php"><i class="fa fa-upload"></i> Book Referrence</a></li>
            <li><a href="reservation.php"><i class="fa fa-folder"></i> Reservation</a></li>
            <li><a href="reports.php"><i class="fa fa-file"></i> Reports</a></li>
            <li><a href="students.php"><i class="fa fa-male"></i> Students</a></li>
            <li><a href="users.php"><i class="fa fa-users  "></i> Users</a></li>

    <?php
      }?> 
      </ul> 
</div>