 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
         <img src="{{ asset('admin/assets/img/logo.png') }}" alt="" style="height:40px;width:40px" class="me-2">
      <h1 class="logo me-auto"><a href="{{ route('homepage') }}">Dyu Publication</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0 mx-auto">
        <ul>
          <li><a class="active" href="{{ route('homepage') }}">Home</a></li>
          <li><a href="{{ route('user_orders.index') }}">Order</a></li>
           
         
          <li><a href="">Events</a></li>
           
   <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
            
       
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <!-- Cart Icon with Bootstrap Badge -->
 
 <a href="{{ route('shoppings.index') }}">

   <span class="position-relative me-5">
  <i class="fas fa-shopping-cart fa-2x text-dark"></i>
  <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-danger" id="cartCount">
    
    
       
      
         {{ $cartCount}}
       

          <!-- Replace this number with the actual number of items in the cart -->
    <span class="visually-hidden">items in cart</span>
  </span>
</span>
 </a>



       @if (Auth::user())
       
   <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
         {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Order</a></li>
           <li>
             
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item d-flex align-items-center btn"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                        <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                       {{-- {{ __('Log Out') }} --}}
                  </a>
                </form>

            </li>

        </ul>
      </li>
    </ul>
       
       @else
       
         <a href="{{ route('login') }}" class="get-started-btn">Login</a>
        
       
           
       @endif
     
    </div>
  </header><!-- End Header -->