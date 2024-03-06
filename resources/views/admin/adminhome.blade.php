<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Side Navbar - Tivotal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
  </head>
  <body>
    <section class="sidebar">
      <div class="nav-header">
        <p class="logo">
          <img src="images/bato.png" id="img" alt="Instagram Logo" class="logo">
        </p>
        <i class="bx bx-menu btn-menu"></i>
      </div>
      <ul class="nav-links">
        <li>
          <a href="profile">
            <i class='bx bx-user-circle'></i>
            <span class="title">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
          </a>
          <span class="tooltip">Profile</span>
        </li>
        <li id="homeLink">
          <a href="home">
          <i class='bx bx-home'></i>
            <span class="title">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li>
          <a href="mapping">
          <i class='bx bx-map-alt'></i>
            <span class="title">Geolocation and<br> Mapping</span>
          </a>
          <span class="tooltip">Geolocation  and Mapping</span>
        </li>
        <li>
          <a href="accounts#">
          <i class='bx bx-registered'></i>
            <span class="title">Registered Farmers </span>
          </a>
          <span class="tooltip">Registered Farmers</span>
        </li>
        <li>
          <a href="insurance">
          <i class='bx bx-shield-quarter'></i>
            <span class="title">Registered Farmer<br> Insurance</span>
          </a>
          <span class="tooltip">Registered Farmer Insurance</span>
        </li>
        <li>
          
        @if(Auth::check() && Auth()->user()->usertype === 'admin')
    <li>
        <a href="users">
            <i class='bx bxs-user-detail'></i>
            <span class="title">Register Office Staff</span>
        </a>
        <span class="tooltip">Register Office Staff</span>
    </li>
@endif


        
<li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf  <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
       
          <i class='bx bx-log-out'></i>
          
            <span class="title">{{ __('Log Out') }}</span>
            
         
</a>
        </form>
          <span class="tooltip">log-out</span>
        </li>


      
        
 
      
      </ul>
      <br>  
      <div class="theme-wrapper">
        <i class='bx bx-adjust theme-icon'></i>
        <p>Change Theme</p>
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
      
    </section>
 
      <div class="topH">
      @if(Auth::check()) {{-- Check if user is logged in --}}
    @if(Auth::user()->usertype == 'admin')
        {{-- Display 'admin' if usertype is admin --}}
       <h2 id="admin"> Admin </h2> 
    @else
        {{-- Display user's position if usertype is not admin --}}
        <h2 id="admin"> {{ Auth::user()->position }}</h2> 
    @endif
@else
    {{-- Display something if the user is not logged in --}}
    Not logged in
@endif

        
         
     
    
 

        </form>
       

  </div>
    </section>
    
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    const btn_menu = document.querySelector(".btn-menu");
    const side_bar = document.querySelector(".sidebar");

    // Add the "expand" class by default
    side_bar.classList.add("expand");

    const btn_theme = document.querySelector(".theme-btn");
    const theme_ball = document.querySelector(".theme-ball");

    const localData = localStorage.getItem("theme");

    if (localData == null) {
      localStorage.setItem("theme", "light");
    }

    if (localData == "dark") {
      document.body.classList.add("dark-mode");
      theme_ball.classList.add("dark");
    } else if (localData == "light") {
      document.body.classList.remove("dark-mode");
      theme_ball.classList.remove("dark");
    }

    btn_theme.addEventListener("click", function () {
      document.body.classList.toggle("dark-mode");
      theme_ball.classList.toggle("dark");
      if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
      } else {
        localStorage.setItem("theme", "light");
      }
    });
  });
</script>


  </body>
</html>
