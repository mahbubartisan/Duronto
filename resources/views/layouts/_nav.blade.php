 <aside class="sidebar-nav-wrapper">
     <div class="navbar-logo">
         <a href="{{ route("dashboard") }}">
             {{-- <img src="{{ asset("assets/images/logo/logo.svg") }}" alt="logo" /> --}}
             <img src="https://cdn-icons-png.flaticon.com/512/5332/5332306.png" class="text-center"
                 style="width: 35px; height: 35px;" alt="logo" />
         </a>
     </div>
     <nav class="sidebar-nav">
         <ul>
             <li class="nav-item">
                 <a href="{{ route("dashboard") }}">
                     <span class="icon mt-1">
                         <i class="lni lni-dashboard"></i>
                     </span>
                     <span class="text">
                         Dashboard
                     </span>
                 </a>
             </li>
             <!-- Users -->
             <li class="nav-item nav-item-has-children">
                 <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_5"
                     aria-controls="ddmenu_5" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="icon mt-1">
                         <i class="lni lni-users"></i>
                     </span>
                     <span class="text"> Users </span>
                 </a>
                 <ul id="ddmenu_5" class="collapse dropdown-nav">
                     <li>
                         <a href="{{ route('duronto.user') }}"> Duronto POS </a>
                     </li>
                     <li>
                         <a href="{{ route('riser.user') }}"> Riser POS </a>
                     </li>
                 </ul>
             </li>
             <!-- Packages -->
             <li class="nav-item nav-item-has-children">
                 <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_77"
                     aria-controls="ddmenu_77" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="icon mt-1">
                         <i class="lni lni-package"></i>
                     </span>
                     <span class="text"> Packages </span>
                 </a>
                 <ul id="ddmenu_77" class="collapse dropdown-nav">
                     <li>
                         <a href="{{ route('duronto.package') }}">
                             <span class="text">
                                 Duronto POS
                             </span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('riser.package') }}">
                             <span class="text">
                                 Riser POS
                             </span>
                         </a>
                     </li>
                 </ul>
             </li>
             <!-- Subscriptions -->
             <li class="nav-item nav-item-has-children">
                 <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_7"
                     aria-controls="ddmenu_7" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="icon mt-1">
                         <i class="lni lni-coin"></i>
                     </span>
                     <span class="text"> Subscriptions </span>
                 </a>
                 <ul id="ddmenu_7" class="collapse dropdown-nav">
                     <li>
                         <a href="{{ route('duronto.subscription') }}">
                             <span class="text">
                                 Duronto POS
                             </span>
                         </a>
                     </li>
                     <li>
                         <a href="{{ route('riser.subscription') }}">
                             <span class="text">
                                 Riser POS
                             </span>
                         </a>
                     </li>
                 </ul>
             </li>
             <li class="nav-item">
                 <a href="{{ route("settings") }}">
                     <span class="icon mt-1">
                         <i class="lni lni-cog"></i>
                     </span>
                     <span class="text">Settings</span>
                 </a>
             </li>
         </ul>
     </nav>
 </aside>
 <div class="overlay"></div>
