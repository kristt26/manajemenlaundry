<!DOCTYPE html>
<html lang="en" ng-app="apps">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Breeze Admin</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
  <link rel="stylesheet" href="assets/vendors/select2/select2.min.css" />
  <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="shortcut icon" href="assets/images/favicon.png" />
  <link href="<?= base_url() ?>/libs/angular-datatables/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url() ?>libs/angular-tooltips/dist/angular-tooltips.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <!-- <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a> -->
        <a class="sidebar-brand brand-logo" href="index.html">Manajemen Laundry</a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html">ML</a>
      </div>
      <?= $this->include('layout/menu'); ?>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close mdi mdi-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-default-theme">
          <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
        </div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme">
          <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles light"></div>
          <div class="tiles dark"></div>
        </div>
      </div>
      <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
          <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
            <i class="mdi mdi-menu"></i>
          </button>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count count-varient1">7</span>
              </a>
              <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                    </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                  </div>
                  <div class="preview-item-content">
                    <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0">View all activities</p>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-sm-flex">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-outline"></i>
                <span class="count count-varient2">5</span>
              </a>
              <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-success">Request</span>
                    <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-warning">Invoices</span>
                    <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-item-content flex-grow">
                    <span class="badge badge-pill badge-danger">Projects</span>
                    <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                  </div>
                  <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                </a>
                <h6 class="p-3 mb-0">See all activity</h6>
              </div>
            </li>
            <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
              <form class="nav-link form-inline mt-2 mt-md-0">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" />
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-magnify"></i>
                    </span>
                  </div>
                </div>
              </form>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right ml-lg-auto">
            <li class="nav-item dropdown d-none d-xl-flex border-0">
              <a class="nav-link dropdown-toggle" id="languageDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-earth"></i> English </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                <a class="dropdown-item" href="#"> French </a>
                <a class="dropdown-item" href="#"> Spain </a>
                <a class="dropdown-item" href="#"> Latin </a>
                <a class="dropdown-item" href="#"> Japanese </a>
              </div>
            </li>
            <li class="nav-item nav-profile dropdown border-0">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                <span class="profile-name">Henry Klein</span>
              </a>
              <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">Form elements</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Form elements </li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <?= $this->renderSection('content') ?>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/select2/select2.min.js"></script>
  <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/file-upload.js"></script>
  <script src="assets/js/typeahead.js"></script>
  <script src="assets/js/select2.js"></script>
  <script src="<?= base_url() ?>libs/angular/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js" integrity="sha512-JkCv2gG5E746DSy2JQlYUJUcw9mT0vyre2KxE2ZuDjNfqG90Bi7GhcHUjLQ2VIAF1QVsY5JMwA1+bjjU5Omabw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.30/angular-ui-router.min.js" integrity="sha512-HdDqpFK+5KwK5gZTuViiNt6aw/dBc3d0pUArax73z0fYN8UXiSozGNTo3MFx4pwbBPldf5gaMUq/EqposBQyWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-animate/1.8.2/angular-animate.min.js" integrity="sha512-jZoujmRqSbKvkVDG+hf84/X11/j5TVxwBrcQSKp1W+A/fMxmYzOAVw+YaOf3tWzG/SjEAbam7KqHMORlsdF/eA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= base_url() ?>js/apps.js"></script>

  <script src="<?= base_url() ?>js/services/helper.services.js"></script>
  <script src="<?= base_url() ?>js/services/auth.services.js"></script>
  <script src="<?= base_url() ?>js/services/admin.services.js"></script>
  <script src="<?= base_url() ?>js/services/pesan.services.js"></script>
  <script src="<?= base_url() ?>js/controllers/admin.controllers.js"></script>
  <!-- <script src="<?= base_url() ?>libs/sweetalert2/dist/sweetalert2.all.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- <script src="<?= base_url() ?>libs/select2/select22.min.js"></script> -->
  <script src="<?= base_url() ?>libs/angular-ui-select2/src/select2.js"></script>
  <script src="<?= base_url() ?>libs/angular-datatables/dist/angular-datatables.min.js"></script>
  <script src="<?= base_url() ?>libs/angular-locale_id-id.js"></script>
  <script src="<?= base_url() ?>libs/input-mask/angular-input-masks-standalone.min.js"></script>
  <script src="<?= base_url() ?>libs/jquery.PrintArea.js"></script>
  <script src="<?= base_url() ?>libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
  <script src="<?= base_url() ?>libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>libs/datatables/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>libs/datatables/btn.js"></script>
  <script src="<?= base_url() ?>libs/datatables/print.js"></script>
  <script src="<?= base_url() ?>libs/qrcode/qrcode.min.js"></script>
  <script src="<?= base_url() ?>libs/loading/dist/loadingoverlay.min.js"></script>
  <script src="<?= base_url() ?>libs/angular-tooltips/dist/angular-tooltips.js"></script>
</body>

</html>