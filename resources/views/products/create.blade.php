@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- BEGIN: En-tête -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        Ajouter un produit
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active">Créer</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- END: En-tête -->

<!-- BEGIN: Contenu de la page principale -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-4">
                <!-- Carte d'image du produit -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Image du produit</div>
                    <div class="card-body text-center">
                        <!-- Image du produit -->
                        <img class="img-account-profile mb-2" src="{{ asset('assets/img/products/default.webp') }}" alt="" id="image-preview" />
                        <!-- Bloc d'aide pour l'image du produit -->
                        <div class="small font-italic text-muted mb-2">JPG ou PNG d'une taille maximale de 2 Mo</div>
                        <!-- Champ d'entrée pour l'image du produit -->
                        <input class="form-control form-control-solid mb-2 @error('product_image') is-invalid @enderror" type="file"  id="image" name="product_image" accept="image/*" onchange="previewImage();">
                        @error('product_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- BEGIN: Détails du produit -->
                <div class="card mb-4">
                    <div class="card-header">
                        Détails du produit
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom du produit) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="product_name">Nom du produit <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('product_name') is-invalid @enderror" id="product_name" name="product_name" type="text" placeholder="" value="{{ old('product_name') }}" autocomplete="off"/>
                            @error('product_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (catégorie du produit) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="category_id">Catégorie du produit <span class="text-danger">*</span></label>
                                <select class="form-select form-control-solid @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                    <option selected="" disabled="">Sélectionner une catégorie :</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (unité du produit) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="unit_id">Unité <span class="text-danger">*</span></label>
                                <select class="form-select form-control-solid @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id">
                                    <option selected="" disabled="">Sélectionner une unité :</option>
                                    @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" @if(old('unit_id') == $unit->id) selected="selected" @endif>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (prix d'achat) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="buying_price">Prix d'achat <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('buying_price') is-invalid @enderror" id="buying_price" name="buying_price" type="text" placeholder="" value="{{ old('buying_price') }}" autocomplete="off" />
                                @error('buying_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Groupe de formulaire (prix de vente) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="selling_price">Prix de vente <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('selling_price') is-invalid @enderror" id="selling_price" name="selling_price" type="text" placeholder="" value="{{ old('selling_price') }}" autocomplete="off" />
                                @error('selling_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- Groupe de formulaire (stock) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="stock">Stock <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('stock') is-invalid @enderror" id="stock" name="stock" type="text" placeholder="" value="{{ old('stock') }}" autocomplete="off" />
                            @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Bouton Soumettre -->
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                        <a class="btn btn-danger" href="{{ route('products.index') }}">Annuler</a>
                    </div>
                </div>
                <!-- END: Détails du produit -->
            </div>
        </div>
    </form>
</div>
<!-- END: Contenu de la page principale -->
@endsection
