<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8143421247.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="{{asset('css/abasas.css')}}">
       <!-- Custom styles for this page -->
       <link href="{{asset('file/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  
  </head>
  <body>

            <nav class="navbar justify-content-center  sticky-top ">
                <a class="navbar-brand" href="https://abasas.tech" > <img   src="{{asset('Abasas.com logo.png')}}" alt="abasas.tech" style="height:80px;"> </a>



                
            @if(!Auth::guest())
            <ul class="navbar-nav ">

<div class="topbar-divider d-none d-sm-block"></div>
<!-- Nav Item - User Information -->
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline  small text-dark">{{Auth::user()->name}}</span>
    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
  </a>
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in   bg-abasas-dark " aria-labelledby="userDropdown">
    <!-- <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a> -->
    <a class="dropdown-item    bg-abasas-dark " href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>
</li>
@else
<li class="nav-item">
  <a href="{{ route('login') }}" class="nav-link">login</a>
</li>

<div class="topbar-divider d-none d-sm-block"></div>

<li class="nav-item">
  <a href="{{ route('register') }}" class="nav-link">Register</a>
</li>
            </ul>
@endif

            </nav>







            
        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
         <div class="modal-footer">
           <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>
      
  @yield('content')

  <input type="text"  id="indexLink" value="{{route('index')}}" hidden >
  <input type="text"  id="task_level_list_api" value="{{route('task_level_list_api')}}" hidden >
  <input type="text"  id="task_status_list_api" value="{{route('task_status_list_api')}}" hidden >
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <!-- Page level plugins -->
    <script src="{{asset('file/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('file/datatables/dataTables.bootstrap4.min.js')}}"></script>



    <script src="{{asset('js/abasas.js')}}"></script>
  </body>
</html>