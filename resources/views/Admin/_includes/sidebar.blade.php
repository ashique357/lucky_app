<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="#" class="brand-link">  
   <img src="" alt="" class="brand-image img-circle elevation-3"
      style="opacity: .8">
   <span class="brand-text font-weight-light">Lucky app</span>
   </a>
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block">Admin</a>
         </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
               <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="/admin/register-users" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>
                     Register User
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="/admin/lottery-history" class="nav-link">
                  <i class="fas fa-tasks"></i>
                  <p>
                     Show Lottery History
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="/admin/profile" class="nav-link">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <p>
                     Profile
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="/admin/choose-lucky-number" class="nav-link">
                  <i class="fas fa-dollar-sign"></i>
                  <p>
                     Run Lottery 
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="/admin/manage-users" class="nav-link">
                  <i class="fas fa-users-cog"></i>
                  <p>
                     Manage User 
                  </p>
               </a>
            </li>
            <li class="nav-item">
               <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                     Mission
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                     <a href="/admin/daily-quiz" class="nav-link">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <p>
                           Daily Quiz 
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Affilate</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Weekly Quiz</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Deposit Casino Brand</p>
                     </a>
                  </li>
               </ul>
            </li>
            <!--<li class="nav-item">
               <a href="/admin/message" class="nav-link">
               <i class="fas fa-comments"></i>
                 <p>
                   Message 
                 </p>
               </a>
               </li>
               <li class="nav-item">
               <a href="/admin/affilate" class="nav-link">
               <i class="fas fa-handshake"></i>              
               <p>
                   Affilate 
                 </p>
               </a>
               <!-- </li> -->
            <li class="nav-item">
               <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fas fa-handshake"></i>
                  <p>Logout</p>
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