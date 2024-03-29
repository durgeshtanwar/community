<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Shakdwipiya Pariwar</title>

  <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini control-sidebar-push">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
     {{-- <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div> 
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
                <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" class="btn btn-primary">
          <button class="btn btn-primary"><i class="fas fa-bell"></i>
            @if(auth()->user()->unreadnotifications->count())
            <span class="badge badge-light">{{auth()->user()->unreadnotifications->count()}}</span>
            @endif
          </button>
          
          </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          @if(auth()->user()->unreadnotifications->count())
          <a href="{{route('markRead')}}" class="dropdown-item text-success text-center"><strong>Mark As Read</strong></a>
          @else
          <a href="#" class="dropdown-item text-success text-center"><strong>No New Notification</strong></a>
          @endif
          @foreach(auth()->user()->unReadNotifications as $notification)
         
          <div class="dropdown-divider"></div>
          <a href="/events" class="dropdown-item btn btn-primary bg-light">
            <i class="fas fa-envelope mr-2"></i> {{$notification->data['data'] }}
          </a>
          @endforeach

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            @foreach(auth()->user()->ReadNotifications as $notification)
            <div class="dropdown-divider"></div>
            <a href="/events" class="dropdown-item btn btn-primary">
              <i class="fas fa-envelope mr-2"></i> {{$notification->data['data'] }}
            </a>
            @endforeach
          
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary  elevation-4">
    <!-- Brand Logo -->
    <router-link to="/dashboard" class="brand-link">
      <img src="./images/logo.png" alt="" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">Shakdwipiya</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./images/profile/{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
                <router-link to="/dashboard" class="nav-link">
                  <i class="nav-icon blue fas fa-tachometer-alt"></i>
                  <p>
                   Dashboard
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </router-link>
              </li>
              
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fas fa-users teal"></i>
              <p>
                 Family
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Gate::check('isAdmin') || Gate::check('isFamily'))
              <li class="nav-item">
                <router-link to="/addFamily" class="nav-link">
                  <i class="fas pink fa-user nav-icon"></i>
                  <p>Add New Family Member</p>
                </router-link>
              </li>
              @endif
              <li class="nav-item">
                <router-link to="/family" class="nav-link">
                  <i class="fas pink fa-user nav-icon"></i>
                  <p>Members in Family</p>
                </router-link>
              </li>
             
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/getmembers" class="nav-link">
              <i class="fas fa-address-book yellow"></i>
              <p>
                 Directory
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/events" class="nav-link">
              <i class="fas fa-calendar-alt"></i>
              <p>
                 Events
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/job" class="nav-link">
              <i class="nav-icon indigo fas fa-code"></i>
              <p>
                Jobs
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/myjobs" class="nav-link">
                  <i class="nav-icon indigo fas fa-code"></i>
                  <p>
                   Post a Job
                    {{-- <span class="right badge badge-danger">New</span> --}}
                  </p>
                </router-link>
              </li> 
          <li class="nav-item">
            <router-link to="/myapplications" class="nav-link">
              <i class="nav-icon indigo fas fa-code"></i>
              <p>
                Apply Job
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/applicants" class="nav-link">
              <i class="nav-icon indigo fas fa-code"></i>
              <p>
                Job Applicants
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
          </li> 
            </ul>
          </li>
          @can('isAdmin')
          <li class="nav-item">
            <router-link to="/settings" class="nav-link">
              <i class="nav-icon yellow fas fa-users-cog"></i>
              <p>
               Admin Area
                <span class="right badge badge-danger">New</span>
              </p>
            </router-link>
          </li>
          @endcan 
            <ul>
            </ul>
            
          {{-- </li> --}}
          <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user-friends orange"></i>
                <p>
                   Matrimonial
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <router-link to="/getbride" class="nav-link active">
                    <i class="fas pink fa-female nav-icon"></i>
                    <p>Bride</p>
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/getgroom" class="nav-link">
                    <i class="fas fa-male blue nav-icon"></i>
                    <p>Groom</p>
                  </router-link>>
                </li>
              </ul>
            </li>
          
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
              <i class="nav-icon fas fa-user teal"></i>
              <p>
                Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off red"></i>
              <p>
                {{ __('Logout') }}
                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>
        
        <vue-progress-bar></vue-progress-bar>
      </div> <!--/container fluid-->
    </div> 
    {{-- content --}}

           
  </div>
  <!-- /.content-wrapper -->

 
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      बेटी बचाओ बेटी पढाओ 
    </div>
    <!-- Default to the left -->
    <strong>Made in India by <a href="https://ideafusion.in">ideafusion</a>.</strong> All rights reserved By Shakdwipiya Pariwar.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="/js/app.js"></script>
</body>
</html>