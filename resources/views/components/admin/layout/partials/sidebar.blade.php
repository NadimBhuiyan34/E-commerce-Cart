  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('admin') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->


          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('orders.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Order</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('sells.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Book Sell</span>
              </a>
          </li><!-- End Profile Page Nav -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('categories.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Category</span>
              </a>
          </li><!-- End Profile Page Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('books.index') }}">
                  <i class="bi bi-question-circle"></i>
                  <span>Add Book</span>
              </a>
          </li><!-- End F.A.Q Page Nav -->
         


      </ul>

  </aside><!-- End Sidebar-->
