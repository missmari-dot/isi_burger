<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <!-- Barre de recherche -->
        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                        <i class="fa fa-search search-icon"></i>
                    </button>
                </div>
                <input type="text" placeholder="Rechercher ..." class="form-control" />
            </div>
        </nav>

        <!-- Navigation supérieure -->
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
            <!-- Icône de recherche mobile -->
            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                    <i class="fa fa-search"></i>
                </a>
                <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                        <div class="input-group">
                            <input type="text" placeholder="Rechercher ..." class="form-control" />
                        </div>
                    </form>
                </ul>
            </li>

            <!-- Dropdown des messages -->
            <li class="nav-item topbar-icon dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-envelope"></i>
                </a>
                <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                    <li>
                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                            Messages
                            <a href="#" class="small">Tout marquer comme lu</a>
                        </div>
                    </li>
                    <li>
                        <div class="message-notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <!-- Exemples de messages -->
                                <a href="#">
                                    <div class="notif-img">
                                        <img src="assets/img/jm_denis.jpg" alt="Profil" />
                                    </div>
                                    <div class="notif-content">
                                        <span class="subject">Jimmy Denis</span>
                                        <span class="block">Comment ça va ?</span>
                                        <span class="time">Il y a 5 minutes</span>
                                    </div>
                                </a>
                                <!-- Répéter pour d'autres messages -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">Voir tous les messages<i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </li>

            <!-- Dropdown des notifications -->
            <li class="nav-item topbar-icon dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="notification">4</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">Vous avez 4 nouvelles notifications</div>
                    </li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                                <!-- Exemples de notifications -->
                                <a href="#">
                                    <div class="notif-icon notif-primary">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                    <div class="notif-content">
                                        <span class="block">Nouvel utilisateur inscrit</span>
                                        <span class="time">Il y a 5 minutes</span>
                                    </div>
                                </a>
                                <!-- Répéter pour d'autres notifications -->
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">Voir toutes les notifications<i class="fa fa-angle-right"></i></a>
                    </li>
                </ul>
            </li>

            <!-- Dropdown de l'utilisateur -->
            <li class="nav-item topbar-user dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                    </div>
                    <span class="profile-username">
                        <span class="op-7">Bonjour,</span>
                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="assets/img/profile.jpg" alt="Profil" class="avatar-img rounded" />
                                </div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                    <a href="{{ route('profile.edit') }}" class="btn btn-xs btn-secondary btn-sm">Voir le profil</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Mon profil</a>
                            <a class="dropdown-item" href="#">Mon solde</a>
                            <a class="dropdown-item" href="#">Boîte de réception</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Paramètres du compte</a>
                            <div class="dropdown-divider"></div>
                            <!-- Déconnexion -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Déconnexion</a>
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- Fin de la Navbar -->