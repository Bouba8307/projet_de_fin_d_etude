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
                        Paramètres du compte - Profil
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
        <a class="nav-link active ms-0" href="{{ route('profile.edit') }}">Profil</a>
        <a class="nav-link" href="{{ route('profile.settings') }}">Paramètres</a>
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

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-xl-4">
                <!-- Carte de la photo de profil -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profil</div>
                    <div class="card-body text-center">
                        <!-- Image de la photo de profil -->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ $user->photo ? asset('storage/profile/'.$user->photo) : asset('assets/img/illustrations/profiles/profile-1.png') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide pour la photo de profil -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG, pas plus de 1 Mo</div>
                        <!-- Entrée pour la photo de profil -->
                        <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file"  id="image" name="photo" accept="image/*" onchange="previewImage();">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- Carte des détails du compte -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du compte
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom d'utilisateur) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="username">Nom d'utilisateur</label>
                            <input class="form-control form-control-solid @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="" value="{{ old('username', $user->username) }}" autocomplete="off" />
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (nom complet) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom complet</label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $user->name) }}" autocomplete="off" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (adresse e-mail) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Adresse e-mail</label>
                            <input class="form-control form-control-solid @error('photo') is-invalid @enderror" id="email" name="email" type="text" placeholder="" value="{{ old('email', $user->email) }}"  autocomplete="off" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Bouton Enregistrer les modifications -->
                        <button class="btn btn-primary" type="submit">Mettre à jour</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- FIN: Contenu principal de la page -->
@endsection
