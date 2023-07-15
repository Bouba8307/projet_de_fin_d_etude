<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- En-tête du menu latéral (Principal)-->
            <div class="sidenav-menu-heading">Principal</div>
            <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Tableau de bord
            </a>
            <a class="nav-link {{ Request::is('pos*') ? 'active' : '' }}" href="{{ route('pos.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                PDV
            </a>

            <!-- En-tête du menu latéral (Commandes)-->
            <div class="sidenav-menu-heading">Commandes</div>
            <a class="nav-link {{ Request::is('orders/complete*') ? 'active' : '' }}" href="{{ route('order.completeOrders') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-circle-check"></i></div>
                Terminées
            </a>
            <a class="nav-link {{ Request::is('orders/pending*') ? 'active' : '' }}" href="{{ route('order.pendingOrders') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-clock"></i></div>
                En attente
            </a>
            <a class="nav-link {{ Request::is('orders/due*') ? 'active' : '' }}" href="{{ route('order.dueOrders') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-credit-card"></i></div>
                Dûes
            </a>
            <!-- En-tête du menu latéral (Achats)-->
            <div class="sidenav-menu-heading">Achats</div>
            <a class="nav-link {{ Request::is('purchases', 'purchase/create*', 'purchases/details*') ? 'active' : '' }}" href="{{ route('purchases.allPurchases') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-cash-register"></i></div>
                Tous
            </a>
            <a class="nav-link {{ Request::is('purchases/approved*') ? 'active' : '' }}" href="{{ route('purchases.approvedPurchases') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-circle-check"></i></div>
                Approuvés
            </a>
            <a class="nav-link {{ Request::is('purchases/report*') ? 'active' : '' }}" href="{{ route('purchases.dailyPurchaseReport') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-flag"></i></div>
                Rapport d'achat quotidien
            </a>

            <!-- Accordion du menu latéral (Pages)-->
            {{-- <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Personnes
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesCustomers">
                    <!-- Accordion imbriqué du menu latéral (Pages -> Personnes)-->
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseCustomers" aria-expanded="false" aria-controls="pagesCollapseCustomers">
                        Clients
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseCustomers" data-bs-parent="#accordionSidenavPagesCustomers">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="#">Afficher tous</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="#">Clients</a>
                    <a class="nav-link" href="#">Fournisseurs</a>
                </nav>
            </div> --}}

            <!-- En-tête du menu latéral (Pages)-->
            <div class="sidenav-menu-heading">Pages</div>
            <a class="nav-link {{ Request::is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Clients
            </a>
            <a class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Fournisseurs
            </a>

            <!-- En-tête du menu latéral (Produits)-->
            <div class="sidenav-menu-heading">Produits</div>
            <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                Produits
            </a>
            <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-folder"></i></div>
                Catégories
            </a>
            <a class="nav-link {{ Request::is('units*') ? 'active' : '' }}" href="{{ route('units.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-folder"></i></div>
                Unités
            </a>

            <!-- En-tête du menu latéral (Paramètres)-->
            <div class="sidenav-menu-heading">Paramètres</div>
            <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <div class="nav-link-icon"><i class="fa-solid fa-users"></i></div>
                Utilisateurs
            </a>
        </div>
    </div>

    <!-- Pied de page du menu latéral-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Connecté en tant que :</div>
            <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
        </div>
    </div>
</nav>
