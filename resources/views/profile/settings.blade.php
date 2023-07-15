@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Paramètres du compte - Paramètres
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- DÉBUT: Contenu principal de la page -->
<div class="container-xl px-4 mt-4">
    <!-- Navigation de la page du compte -->
    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="{{ route('profile.edit') }}">Profil</a>
        <a class="nav-link active" href="{{ route('profile.settings') }}">Paramètres</a>
    </nav>

    <hr class="mt-0 mb-4" />

    <!-- DÉBUT: Alerte -->
    @if (session()->has('success'))
    <div class="alert alert-success alert-icon" role="alert">
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        <div class="alert-icon-aside">
            <i class="far fa-flag"></i>
        </div>
        <div class="alert-icon-content">
            {{ session('success') }}
        </div>
    </div>
    @endif
    <!-- FIN: Alerte -->

    <!-- DÉBUT: FORMULAIRE -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Carte de changement de mot de passe -->
            <div class="card mb-4">
                <div class="card-header">Changer de mot de passe</div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- Groupe de formulaire (mot de passe actuel) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="current_password">Mot de passe actuel <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('current_password') is-invalid @enderror" id="current_password" name="current_password" type="password" placeholder="" />
                            @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (nouveau mot de passe) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="password">Nouveau mot de passe <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="" />
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (confirmation du mot de passe) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="password_confirmation">Confirmer le mot de passe <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" type="password" placeholder="" />
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Carte d'authentification à deux facteurs -->
            <div class="card mb-4">
                <div class="card-header">Authentification à deux facteurs</div>
                <div class="card-body">
                    <p>Ajoutez un niveau supplémentaire de sécurité à votre compte en activant l'authentification à deux facteurs. Nous vous enverrons un message texte pour vérifier vos tentatives de connexion sur des appareils et navigateurs non reconnus.</p>
                    <form>
                        <div class="form-check">
                            <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="" />
                            <label class="form-check-label" for="twoFactorOn">Activé</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor" />
                            <label class="form-check-label" for="twoFactorOff">Désactivé</label>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Carte de suppression de compte -->
            <div class="card mb-4">
                <div class="card-header">Supprimer le compte</div>
                <div class="card-body">
                    <p>Supprimer votre compte est une action permanente et ne peut pas être annulée. Si vous êtes sûr de vouloir supprimer votre compte, sélectionnez le bouton ci-dessous.</p>
                    <button class="btn btn-danger-soft text-danger" type="button">Je comprends, supprimez mon compte</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN: FORMULAIRE -->
</div>
<!-- FIN: Contenu principal de la page -->
@endsection
