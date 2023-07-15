@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- DÉBUT : En-tête -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-users"></i></div>
                        Modifier l'utilisateur
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Utilisateurs</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- FIN : En-tête -->

<!-- DÉBUT : Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('users.update', $user->username) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-4 h-auto">
                <!-- Carte de la photo de profil -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profil</div>
                    <div class="card-body text-center">
                        <!-- Image de la photo de profil -->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ $user->photo ? asset('storage/profile/'.$user->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide pour la photo de profil -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG de moins de 1 Mo</div>
                        <!-- Champ pour la photo de profil -->
                        <input class="form-control form-control-solid mb-2 @error('photo') is-invalid @enderror" type="file" id="image" name="photo" accept="image/*" onchange="previewImage();">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- DÉBUT : Détails de l'utilisateur -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails de l'utilisateur
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $user->name) }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (adresse e-mail) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="" value="{{ old('email', $user->email) }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (nom d'utilisateur) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="username">Nom d'utilisateur <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="" value="{{ old('username', $user->username) }}" />
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Boutons de soumission -->
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                        <a class="btn btn-danger" href="{{ route('users.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- FIN : Détails de l'utilisateur -->
            </div>
        </div>
    </form>

    <form action="{{ route('users.updatePassword', $user->username) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-xl-8">
                <!-- DÉBUT : Modifier le mot de passe -->
                <div class="card mb-4">
                    <div class="card-header">
                        Modifier le mot de passe
                    </div>
                    <div class="card-body">
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (mot de passe) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Mot de passe</label>
                                <input class="form-control form-control-solid @error('password') is-invalid @enderror" id="password" name="password" type="password"/>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (confirmation du mot de passe) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password_confirmation">Confirmation du mot de passe</label>
                                <input class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" type="password"/>
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons de soumission -->
                        <button class="btn btn-primary" type="submit"  onclick="return confirm('Voulez-vous changer le mot de passe ?')">Enregistrer</button>
                        <a class="btn btn-danger" href="{{ route('users.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- FIN : Modifier le mot de passe -->
            </div>
        </div>
    </form>
</div>
<!-- FIN : Contenu principal de la page -->
@endsection
