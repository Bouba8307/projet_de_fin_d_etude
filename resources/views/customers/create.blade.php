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
                        Ajouter un client
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active">Créer</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- FIN : En-tête -->

<!-- DÉBUT : Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <!-- Carte de la photo de profil -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profil</div>
                    <div class="card-body text-center">
                        <!-- Image de la photo de profil -->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide de la photo de profil -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG, pas plus de 2 Mo</div>
                        <!-- Champ de saisie de la photo de profil -->
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
                <!-- DÉBUT : Détails du client -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du client
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name') }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (adresse e-mail) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="" value="{{ old('email') }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (numéro de téléphone) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Numéro de téléphone <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="" value="{{ old('phone') }}" />
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (nom de la banque) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="bank_name">Nom de la banque</label>
                                <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                    <option selected="" disabled="">Sélectionnez une banque :</option>
                                    <option value="BRI" @if(old('bank_name') == 'BRI')selected="selected"@endif>BRI</option>
                                    <option value="BNI" @if(old('bank_name') == 'BNI')selected="selected"@endif>BNI</option>
                                    <option value="BCA" @if(old('bank_name') == 'BCA')selected="selected"@endif>BCA</option>
                                    <option value="BSI" @if(old('bank_name') == 'BSI')selected="selected"@endif>BSI</option>
                                    <option value="Mandiri" @if(old('bank_name') == 'Mandiri')selected="selected"@endif>Mandiri</option>
                                </select>
                                @error('bank_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (titulaire du compte) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_holder">Titulaire du compte</label>
                                <input class="form-control form-control-solid @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" type="text" placeholder="" value="{{ old('account_holder') }}" />
                                @error('account_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (numéro de compte) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_number">Numéro de compte</label>
                                <input class="form-control form-control-solid @error('account_number') is-invalid @enderror" id="account_number" name="account_number" type="text" placeholder="" value="{{ old('account_number') }}" />
                                @error('account_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Groupe de formulaire (adresse) -->
                        <div class="mb-3">
                                <label for="address">Adresse <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <!-- Bouton de soumission -->
                        <button class="btn btn-primary" type="submit">Ajouter</button>
                        <a class="btn btn-danger" href="{{ route('customers.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- FIN : Détails du client -->
            </div>
        </div>
    </form>
</div>
<!-- FIN : Contenu principal de la page -->
@endsection
