    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>        
        <div class="header__img">
            <img src="/assets/img/perfil.jpg" alt="">
        </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>             
                    <a href="index.php" class="nav__link nav-home">
                      <i class='bx bx-grid-alt nav__icon' ></i>
                      <span class="nav__name">Home</span>
                    </a><br>
                    <a href="index.php?page=orderManage" class="nav__link ">
                      <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                      <span class="nav__name">Orders</span>
                    </a><br>
                    <a href="index.php?page=categoryManage" class="nav__link ">
                      <i class='bx bx-folder nav__icon' ></i>
                      <span class="nav__name">Category List</span>
                    </a><br>
                    <a href="index.php?page=menuManage" class="nav__link ">
                      <i class='bx bx-message-square-detail nav__icon' ></i>
                      <span class="nav__name">Menu</span>
                    </a><br>                                      
                    <a href="index.php?page=siteManage" class="nav__link ">
                      <i class="fas fa-cogs"></i>
                      <span class="nav__name">Site Settings</span>
                    </a><br>
               
            </div><br>           
            
            <a href="../controller/admin/logout.php" class="nav__link">
              <i class='bx bx-log-out nav__icon' ></i>
              <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
	  $('.nav-<?php echo $page; ?>').addClass('active')
</script>



    