 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Library Management System</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <?php if($_SESSION['access'] == 1){?>
            <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span>Notification</span></a>
                      <ul class="dropdown-menu notif"></ul>
            </li>
            <li><a href="#">FeedBacks</a></li>
            <?php }elseif($_SESSION['access'] == 4){?>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span>Notification</span></a>
                      <ul class="dropdown-menu notif"></ul>
            </li> 
            <?php }?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['username'];?> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout_parse.php">Logout</a></li>
          </ul>

        </div>
      </div>
    </nav>