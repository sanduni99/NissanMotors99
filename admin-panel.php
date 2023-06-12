<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Jquery files -->
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <!-- Import Bootstrap v5.0.2 -->
    <link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files -->
    <link rel="stylesheet" href="CSS/admin-panel.css">
    <!-- Import JavaScript files -->
    <script src="JavaScript/mainScripts.js"></script>
    <script src="JavaScript/admin-panel.js"></script>

    <!-- ...................................................BAR CHART BOOSTRAP............................................ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!------------------------------------------ Bootstrap Icon  -------->
  <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


  
  </head>
  <body>
  <?php 
    session_start();

    if($_SESSION['type'] != "Admin"){
      header('Location:login.php');
    }
    require_once 'mailing/mailConnect.php';
    //function mailing($recever,$subject,$content)
    
    if(isset($_POST['btnEdit'])){
      $_SESSION['passEditID'] = $_POST['hiddenValue'];
      header('Location:admin-panel/update_item_form.php');
    }

    if(isset($_POST['btnEditNews'])){
      $_SESSION['passEditNews'] = $_POST['hiddenValue'];
      header('Location:admin-panel/update_news_form.php');
    }

  ?>
    <!--<header>
        <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #147f8f;" >
            <div class="container-fluid">
              <p class="h5">Nissan Motors</p> &nbsp;&nbsp;
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">News & Updates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                  </li>
                </ul>
                </div>
                <div class="d-flex justify-content-end">
                  <ul class="navbar-nav ">
                    <form class="d-flex justify-content-end">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light" type="submit">Search</button>
                    </form>
                    <li class="nav-item">
                      <a class="nav-link" href="#">   Log in</a>
                    </li>
                  </ul>
                </div>
            </div>
          </nav>
    </header>-->

    <!--Side pannel icon configeration-->
    <table width="100%">
      <tr width="15%">
        <td class="d-flex align-items-start tblLeft" width="15%">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

  <symbol id="home" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
  </symbol>
  <symbol id="speedometer2" viewBox="0 0 16 16">
    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
  </symbol>
  <symbol id="mail" viewBox="0 0 16 16">
    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
  </symbol>
  <symbol id="people-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
  </symbol>
  <symbol id="grid" viewBox="0 0 16 16">
    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
  </symbol>
    <symbol id="site" viewBox="0 0 16 16">
    <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
  </symbol>
  <symbol id="coin" viewBox="0 0 16 16">
    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
    <path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
  </symbol>
  <symbol id="news" viewBox="0 0 16 16">
    <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
    <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
  </symbol>
  <symbol id="report" viewBox="0 0 16 16">
    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
    <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
  </symbol>
  <symbol id="comment" viewBox="0 0 16 16">
    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
 </symbol>
</svg>
        <!--Side panel-->  
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;" height="100">
    <a href="admin-panel.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <img src="Images/icon/logo.jpg" alt="" height="45px">
      <span class="fs-4"> &nbsp;Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="admin-panel.php?dashbord=true" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="admin-panel.php?requests=true" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#mail"/></svg>
          Requests
        </a>
      </li>
      <li>
        <a href="admin-panel.php?active_adverts=true" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Advertiesment
        </a>
      </li>
      <li>
        <a href="advertReport.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#report"/></svg>
          Advertiesment Reports
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#customers-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Admin Profile
        </a>
        <div class="collapse" id="customers-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin-panel.php?admin_profile=true" class="link-dark rounded">User Profile</a></li>
            <li><a href="admin-panel.php?update_profile=true" class="link-dark rounded">Update Details</a></li>
            <li><a href="admin-panel.php?change_password=true" class="link-dark rounded">Change Password</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#site-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#site"/></svg>
          Site
        </a>
        <div class="collapse" id="site-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin-panel.php?sell_item=true" class="link-dark rounded">Insert new item</a></li>
            <li><a href="admin-panel.php?update_item=true" class="link-dark rounded">Update item</a></li>
            <li><a href="admin-panel.php?delete_item=true" class="link-dark rounded">Delete item</a></li>
            <hr>
            <li><a href="admin-panel.php?promote_One=true" class="link-dark rounded">Promote as Admin</a></li>
            <li><a href="admin-panel.php?demote_One=true" class="link-dark rounded">Demote as User</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#finance-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#coin"/></svg>
          Finance
        </a>
        <div class="collapse" id="finance-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin-panel.php?viewPayment=true" class="link-dark rounded">View Payment</a></li>
            <li><a href="admin-panel.php?incomeReport=true" class="link-dark rounded">Income</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#news-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#news"/></svg>
          News
        </a>
        <div class="collapse" id="news-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin-panel.php?add_news=true" class="link-dark rounded">Add News</a></li>
            <li><a href="admin-panel.php?update_news=true" class="link-dark rounded">Update News</a></li>
            <li><a href="admin-panel.php?delete_news=true" class="link-dark rounded">Delete News</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="admin-panel.php?comment=true" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#comment"/></svg>
          Comments
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="Images/user.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION['name'] ?></strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <!--<li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>-->
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>
        </td>


        <td width="85%">
          <div class="displaypanel">
            <!--Pages display panel-->

            <?php 
            if(isset($_GET['dashbord'])){
              INCLUDE 'admin-panel/dashbord.php';
            }

            if(isset($_GET['active_adverts'])){
              INCLUDE 'admin-panel/active_adverts.php';
            }

            if(isset($_GET['requests'])){
              INCLUDE 'admin-panel/requests.php';
            }

            if(isset($_GET['sell_item'])){
              INCLUDE 'admin-panel/sell_item.php';
            }

            if(isset($_GET['update_item'])){
              INCLUDE 'admin-panel/update_item.php';
            }

            if(isset($_GET['updateForm'])){
              INCLUDE 'admin-panel/update_item_form.php';
            }

            if(isset($_GET['delete_item'])){
              INCLUDE 'admin-panel/delete_item.php';
            }

            if(isset($_GET['promote_One'])){
              INCLUDE 'admin-panel/promoteOne.php';
            }

            if(isset($_GET['demote_One'])){
              INCLUDE 'admin-panel/demoteOne.php';
            }

            if(isset($_GET['admin_profile'])){
              INCLUDE 'admin-panel/admin_profile.php';
            }

            if(isset($_GET['update_profile'])){
              INCLUDE 'admin-panel/update_profile.php';
            }

            if(isset($_GET['change_password'])){
              INCLUDE 'admin-panel/change_password.php';
            }

            if(isset($_GET['add_news'])){
              INCLUDE 'admin-panel/add_news.php';
            }

            if(isset($_GET['update_news'])){
              INCLUDE 'admin-panel/update_news.php';
            }

            if(isset($_GET['delete_news'])){
              INCLUDE 'admin-panel/delete_news.php';
            }

            if(isset($_GET['adReport'])){
              INCLUDE 'advertReport.php';
            }

            if(isset($_GET['comment'])){
              INCLUDE 'admin-panel/comment.php';
            }



            if(isset($_GET['viewPayment'])){
              INCLUDE 'admin-panel/Payment/view_payment.php';
            }

            if(isset($_GET['incomeReport'])){
              INCLUDE 'admin-panel/Payment/1_ads_income_report.php';
            }

            if(isset($_GET['temp'])){
              INCLUDE 'temp.php';
            }
            ?>
          </div>
        </td>
      </tr>
    </table>


    <!--<footer class="footer mt-auto py-3 fixed-bottom">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>-->
  </body>
</html>