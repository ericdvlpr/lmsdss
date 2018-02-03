<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
          <?php if($_SESSION['access'] == 1){?>   
          <li><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> <span>Overview</span> </a></li>
            <li><a href="announcements.php"><i class="fa fa-clipboard"></i> <span>Announcements</span></a></li>
            <li><a href="authors.php"><i class="fa fa-pencil"></i> <span>Authors</span></a></li>
            <li><a href="books.php"><i class="fa fa-book"></i>  <span>Books <span></a></li>
            <li><a href="faculty.php"><i class="fa fa-user"></i>  <span>Faculty <span></a></li>
            <li><a href="issuebook.php"><i class="fa fa-download"></i>  <span>Issue Book <span></a></li>
            <li><a href="referrence.php"><i class="fa fa-upload"></i>  <span>Book Referrence <span></a></li>
            <li><a href="reservation.php"><i class="fa fa-folder"></i>  <span>Reservation <span></a></li>
            <li><a href="reports.php"><i class="fa fa-file"></i>  <span>Reports <span></a></li>
            <li><a href="students.php"><i class="fa fa-male"></i>  <span>Students <span></a></li>
            <li><a href="users.php"><i class="fa fa-users  "></i>  <span>Users <span></a></li>
          
       <?php }elseif (($_SESSION['access'] == 2)|| ($_SESSION['access'] == 3)  ) {?>
            <li><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> <span>Overview</span> </a></li>
            <li><a href="announcements.php"><i class="fa fa-clipboard"></i> <span>Announcements</span></a></li>
            <li><a href="authors.php"><i class="fa fa-pencil"></i> <span>Authors</span></a></li>
            <li><a href="books.php"><i class="fa fa-book"></i>  <span>Books <span></a></li>
            <li><a href="faculty.php"><i class="fa fa-user"></i>  <span>Faculty <span></a></li>
            <li><a href="issuebook.php"><i class="fa fa-download"></i>  <span>Issue Book <span></a></li>
       <?php }elseif ($_SESSION['access'] == 4) { ?> 
          <li><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> <span>Overview</span> </a></li>
           <li><a href="requestBook.php"><span>Request for Book</span></a></li>
            
      <?php }elseif($_SESSION['access'] == 5){?>  
       <li><a href="index.php"><span>Overview </span></a></li>
      <li><a href="searchBook.php"><span>Search Book </span></a></li>
      <li><a href="feedback.php"><span>Give Us a FeedBack </span></a></li>
      <?php }else{
        ?>
            <li><a href="index.php"><i class="fa fa-bar-chart-o fa-fw"></i> </span> Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="announcements.php"><i class="fa fa-clipboard"></i> <span>Announcements</span> </a></li>
            <li><a href="authors.php"><i class="fa fa-pencil"></i> <span>Authors</span> </a></li>
            <li><a href="books.php"><i class="fa fa-book"></i> <span>Books</span> </a></li>
            <li><a href="faculty.php"><i class="fa fa-user"></i> <span>Faculty</span> </a></li>
            <li><a href="issuebook.php"><i class="fa fa-download"></i> <span>Issue Book</span> </a></li>
            <li><a href="referrence.php"><i class="fa fa-upload"></i> <span>Book Referrence</span> </a></li>
            <li><a href="reservation.php"><i class="fa fa-folder"></i> <span>Reservation</span> </a></li>
            <li><a href="reports.php"><i class="fa fa-file"></i> <span>Reports</span> </a></li>
            <li><a href="students.php"><i class="fa fa-male"></i> <span>Students</span> </a></li>
            <li><a href="users.php"><i class="fa fa-users  "></i><span> Users</span> </a></li>

    <?php
      }?> 
      </ul>

    </section>
</aside>