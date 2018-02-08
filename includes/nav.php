<header class="main-header" >
  <div class="image">
    <a href="index.php" class="logo navbar-brand">
        <img src="images/icons/dwcl_seal_new.png" width="35" height="35" class="center-block" />

      </a>
  </div>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning countRequest"></span>
            </a>
            <ul class="dropdown-menu">
            <?php if($_SESSION['access'] == 1){?>
              <li class="header">You have <span class="countRequest"></span> notifications</li>
              <li>
                <ul class="menu">
                  <li class="requestnotif">
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <?php } ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                 <img src="images/user.jpg" width="160" height="160" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['username'];?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout_parse.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="setup.php"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  