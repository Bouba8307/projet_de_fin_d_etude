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
                        Modifier le fournisseur
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Fournisseurs</a></li>
                    <li class="breadcrumb-item active">Modifier</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- FIN : En-tête -->

<!-- DÉBUT : Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-4">
                <!-- Carte de la photo de profil -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profil</div>
                    <div class="card-body text-center">
                        <!-- Image de la photo de profil -->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ $supplier->photo ? asset('storage/suppliers/'.$supplier->photo) : asset('assets/img/demo/user-placeholder.svg') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide de la photo de profil -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG ne dépassant pas 1 Mo</div>
                        <!-- Champ d'entrée de la photo de profil -->
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
                <!-- DÉBUT : Détails du fournisseur -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du fournisseur
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="name">Nom <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" id="name" name="name" type="text" placeholder="" value="{{ old('name', $supplier->name) }}" />
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (adresse e-mail) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Adresse e-mail <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" id="email" name="email" type="text" placeholder="" value="{{ old('email', $supplier->email) }}" />
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (nom du magasin) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="shopname">Nom du magasin <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('shopname') is-invalid @enderror" id="shopname" name="shopname" type="text" placeholder="" value="{{ old('shopname', $supplier->shopname) }}" />
                            @error('shopname')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (numéro de téléphone) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="phone">Numéro de téléphone <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('phone') is-invalid @enderror" id="phone" name="phone" type="text" placeholder="" value="{{ old('phone', $supplier->phone) }}" />
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (type de fournisseur) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="type">Type de fournisseur <span class="text-danger">*</span></label>
                                <select class="form-select form-control-solid @error('type') is-invalid @enderror" id="type" name="type">
                                    <option selected="" disabled="">Sélectionner un type :</option>
                                    <option value="Distributeur" @if(old('type', $supplier->type) == 'Distributeur')selected="selected"@endif>Distributeur</option>
                                    <option value="Grossiste" @if(old('type', $supplier->type) == 'Grossiste')selected="selected"@endif>Grossiste</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (nom de la banque) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="bank_name">Nom de la banque</label>
                                <select class="form-select form-control-solid @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name">
                                    <option selected="" disabled="">Sélectionner une banque :</option>
                                    <option value="BRI" @if(old('bank_name', $supplier->bank_name) == 'BRI')selected="selected"@endif>BRI</option>
                                    <option value="BNI" @if(old('bank_name', $supplier->bank_name) == 'BNI')selected="selected"@endif>BNI</option>
                                    <option value="BCA" @if(old('bank_name', $supplier->bank_name) == 'BCA')selected="selected"@endif>BCA</option>
                                    <option value="BSI" @if(old('bank_name', $supplier->bank_name) == 'BSI')selected="selected"@endif>BSI</option>
                                    <option value="Mandiri" @if(old('bank_name', $supplier->bank_name) == 'Mandiri')selected="selected"@endif>Mandiri</option>
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
                                <input class="form-control form-control-solid @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" type="text" placeholder="" value="{{ old('account_holder', $supplier->account_holder) }}" />
                                @error('account_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (numéro de compte) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="account_number">Numéro de compte</label>
                                <input class="form-control form-control-solid @error('account_number') is-invalid @enderror" id="account_number" name="account_number" type="text" placeholder="" value="{{ old('account_number', $supplier->account_number) }}" />
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
                                <textarea class="form-control form-control-solid @error('address') is-invalid @enderror" id="address" name="address" rows="3">{{ old('address', $supplier->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <!-- Bouton de soumission -->
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                        <a class="btn btn-danger" href="{{ route('suppliers.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- FIN : Détails du fournisseur -->
            </div>
        </div>
    </form>
</div>
<!-- FIN : Contenu principal de la page -->
@endsection
