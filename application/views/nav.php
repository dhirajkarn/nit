<div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">NIT PATNA</a>
        <ul class="nav">
          <li class="active"><a href="<?php echo base_url(); ?>teaching">Home</a></li>
          <li class=""><a href="#">Articles</a></li>
          <li class=""><a href="#">Downloads</a></li>
          <li class=""><a href="#">Blogs</a></li>
          <li class="<?php if($cur_page == 'pay_details.php'){ echo 'active'; } ?>"><a href="<?php echo base_url(); ?>teaching/pay_details">Pay Details</a></li>
          <ul class="nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Employee
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>teaching/add_teacher">Add New Teacher</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Tutorials</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">About Us</a></li>
              </ul>
            </li>
          </ul>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
    </div>