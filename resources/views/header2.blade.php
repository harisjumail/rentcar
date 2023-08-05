!DOCTYPE html>
<html>
<head><script nonce="b98c30a4-714d-45d7-8aa4-8aed4eb9f39b">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]},a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Advanced form elements</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/iCheck/all.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/css/select2.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/_all-skins.min.css">


<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">

<a href="https://adminlte.io/themes/AdminLTE/index2.html" class="logo">

<span class="logo-mini"><b>A</b>LT</span>

<span class="logo-lg"><b>Admin</b>LTE</span>
</a>

<nav class="navbar navbar-static-top">

<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<li class="dropdown messages-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope-o"></i>
<span class="label label-success">4</span>
</a>
<ul class="dropdown-menu">
<li class="header">You have 4 messages</li>
<li>

<ul class="menu">
<li>
<a href="#">
<div class="pull-left">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
</div>
<h4>
Support Team
<small><i class="fa fa-clock-o"></i> 5 mins</small>
</h4>
 <p>Why not buy a new awesome theme?</p>
</a>
</li>

<li>
<a href="#">
<div class="pull-left">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
</div>
<h4>
AdminLTE Design Team
<small><i class="fa fa-clock-o"></i> 2 hours</small>
</h4>
<p>Why not buy a new awesome theme?</p>
</a>
</li>
<li>
<a href="#">
<div class="pull-left">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
</div>
<h4>
Developers
<small><i class="fa fa-clock-o"></i> Today</small>
</h4>
<p>Why not buy a new awesome theme?</p>
</a>
</li>
<li>
<a href="#">
<div class="pull-left">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
</div>
<h4>
Sales Department
<small><i class="fa fa-clock-o"></i> Yesterday</small>
</h4>
<p>Why not buy a new awesome theme?</p>
</a>
</li>
<li>
<a href="#">
<div class="pull-left">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
</div>
<h4>
Reviewers
<small><i class="fa fa-clock-o"></i> 2 days</small>
</h4>
<p>Why not buy a new awesome theme?</p>
</a>
</li>
</ul>
</li>
<li class="footer"><a href="#">See All Messages</a></li>
</ul>
</li>

<li class="dropdown notifications-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-bell-o"></i>
<span class="label label-warning">10</span>
</a>
<ul class="dropdown-menu">
<li class="header">You have 10 notifications</li>
<li>

<ul class="menu">
<li>
<a href="#">
<i class="fa fa-users text-aqua"></i> 5 new members joined today
</a>
</li>
<li>
<a href="#">
<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
page and may cause design problems
</a>
</li>
<li>
<a href="#">
<i class="fa fa-users text-red"></i> 5 new members joined
</a>
</li>
<li>
<a href="#">
<i class="fa fa-shopping-cart text-green"></i> 25 sales made
</a>
</li>
<li>
<a href="#">
<i class="fa fa-user text-red"></i> You changed your username
</a>
</li>
</ul>
</li>
<li class="footer"><a href="#">View all</a></li>
</ul>
</li>

<li class="dropdown tasks-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-flag-o"></i>
<span class="label label-danger">9</span>
</a>
<ul class="dropdown-menu">
<li class="header">You have 9 tasks</li>
<li>

<ul class="menu">
<li>
<a href="#">
<h3>
Design some buttons
<small class="pull-right">20%</small>
</h3>
<div class="progress xs">
<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
<span class="sr-only">20% Complete</span>
</div>
</div>
</a>
</li>

<li>
<a href="#">
<h3>
Create a nice theme
<small class="pull-right">40%</small>
</h3>
<div class="progress xs">
<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
<span class="sr-only">40% Complete</span>
</div>
</div>
</a>
</li>

<li>
<a href="#">
<h3>
Some task I need to do
<small class="pull-right">60%</small>
</h3>
<div class="progress xs">
<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
<span class="sr-only">60% Complete</span>
</div>
</div>
</a>
</li>

<li>
<a href="#">
<h3>
Make beautiful transitions
<small class="pull-right">80%</small>
</h3>
<div class="progress xs">
<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
<span class="sr-only">80% Complete</span>
</div>
</div>
</a>
</li>

</ul>
</li>
<li class="footer">
<a href="#">View all tasks</a>
</li>
</ul>
</li>

<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
<span class="hidden-xs">Alexander Pierce</span>
</a>
<ul class="dropdown-menu">

<li class="user-header">
<img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
<p>
Alexander Pierce - Web Developer
<small>Member since Nov. 2012</small>
</p>
</li>

<li class="user-body">
<div class="row">
<div class="col-xs-4 text-center">
<a href="#">Followers</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Sales</a>
</div>
<div class="col-xs-4 text-center">
<a href="#">Friends</a>
</div>
</div>

</li>

<li class="user-footer">
<div class="pull-left">
<a href="#" class="btn btn-default btn-flat">Profile</a>
</div>
<div class="pull-right">
<a href="#" class="btn btn-default btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>

<li>
<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
</li>
</ul>
</div>
</nav>
</header>