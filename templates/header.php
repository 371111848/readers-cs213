<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="/assets/fa/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.css">

    <title><?=$page['title']?> | Readers</title>


  </head>
  <body>
      
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/"><i class="fas text-primary fa-book-reader mr-2"></i>Readers</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <ul class="navbar-nav px-3">
          <!-- <li class="nav-item text-nowrap">
             <a class="nav-link" href="#">Sign out</a> 
          </li> -->
        </ul>
      </nav>
    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky">
            <ul class="nav side-nav flex-column fa-ul">
              <li class="nav-item">
                <a class="nav-link <?=is_active($p,'dashboard')?>" href="/dashboard">
                  <span class="fa-li"><i class="far fa-eye fa-fw"></i></span>
                  Dashboard 
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link <//?=is_active($p,'groups')?>" href="/groups">
                  Groups
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link <?=is_active($p,'members')?>" href="/members">
                <span class="fa-li"><i class="fas fa-users fa-fw"></i></span>
                  Members
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?=is_active($p,'books')?>" href="/books">
                <span class="fa-li"><i class="fas fa-book fa-fw"></i></span>
                Books
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?=is_active($p,'categories')?>" href="/categories">
                <span class="fa-li"><i class="fas fa-bars fa-fw"></i></span>
                Categories
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link <//?=is_active($p,'statistics')?>" href="/statistics">
                  Statistics
                </a>
              </li> -->

            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Data</span>
            </h6>
            <ul class="nav flex-column fa-ul">
              <li class="nav-item">
                  <a class="nav-link <?=is_active($p,'upload')?>" href="/upload">
                  <span class="fa-li"><i class="fas fa-arrow-circle-up fa-fw"></i></span>
                    Upload Data
                  </a>
              </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Readers · 2020</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>

          </div>
        </nav>
        <div class="alerts">
          <?php foreach ($page_alerts as $alert) : ?>
            <div class="alert alert-<?=$alert[0]?> alert-dismissible fade show" role="alert">
              <?=$alert[1]?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endforeach; $page_alerts = array();?>
        </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        
        <div id="loader"></div>

