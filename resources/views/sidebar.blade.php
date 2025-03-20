

<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">

            <li class="nav-item active">
                <a
                    href="{{ route('dashboard') }}"
                    class="collapsed" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    
                </a>
            </li>
            <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Composant</h4>
            </li>

            @if(Auth::user()->isGestionnaire())

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Burgers</p>
                  <span class="caret"></span>
                </a>

                <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{ route('burgers.index') }}">
                                <span class="sub-item">Liste burgers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <span class="sub-item">Categories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

                <li class="nav-item">
                    <a href="{{ route('gestionnaire.commandes.index') }}">
                        <i class="fas fa-th-list"></i>
                        <p>Commandess</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fas fa-file"></i>
                        <p>Factures</p>
                    </a>
                </li>
                
                
            @else
                
                <li class="nav-item">
                    <a href="{{ route('catalogue') }}">
                        <i class="fas fa-table"></i>
                        <p>Catalogues</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('commandes.index') }}">
                        <i class="fas fa-bars"></i>
                        <p>Mes Commandess</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('commandes.create') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Commander</p>
                    </a>
                </li>


            @endif
            
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}">
                    <i class="fas fa-desktop"></i>
                    <p>Mon Profile</p>
                    
                </a>
            </li>
            
        </ul>
        </div>
    </div>
</div>
    <!-- End Sidebar -->