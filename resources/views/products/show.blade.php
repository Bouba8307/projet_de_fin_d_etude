@extends('dashboard.body.main')

@section('content')
<!-- DÉBUT: En-tête -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        Détails du produit
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active">Détails</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- FIN: En-tête -->

<!-- DÉBUT: Contenu principal de la page -->
<div class="container-xl px-2 mt-n10">
        <div class="row">
            <div class="col-xl-4">
                <!-- Carte d'image du produit -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Image du produit</div>
                    <div class="card-body text-center">
                        <!-- Image du produit -->
                        <img class="img-account-profile mb-2" src="{{ asset('assets/img/products/default.webp') }}" alt="" id="image-preview" />
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- DÉBUT: Code du produit -->
                <div class="card mb-4">
                    <div class="card-header">
                        Code du produit
                    </div>
                    <div class="card-body">
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (type de catégorie de produit) -->
                            <div class="col-md-6">
                                <label class="small mb-1">Code du produit</label>
                                <div class="form-control form-control-solid">{{ $product->product_code  }}</div>
                            </div>
                            <!-- Groupe de formulaire (type d'unité de produit) -->
                            <div class="col-md-6 align-middle">
                                <label class="small mb-1">Code-barres</label>
                                <div class="mt-1">
                                  {!! $barcode !!}
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN: Code du produit -->

                <!-- DÉBUT: Informations sur le produit -->
                <div class="card mb-4">
                    <div class="card-header">
                        Informations sur le produit
                    </div>
                    <div class="card-body">
                        <!-- Groupe de formulaire (nom du produit) -->
                        <div class="mb-3">
                            <label class="small mb-1">Nom du produit</label>
                            <div class="form-control form-control-solid">{{ $product->product_name }}</div>
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (type de catégorie de produit) -->
                            <div class="col-md-6">
                                <label class="small mb-1">Catégorie du produit</label>
                                <div class="form-control form-control-solid">{{ $product->category->name  }}</div>
                            </div>
                            <!-- Groupe de formulaire (type d'unité de produit) -->
                            <div class="col-md-6">
                                <label class="small mb-1">Unité du produit</label>
                                <div class="form-control form-control-solid">{{ $product->unit->name  }}</div>
                            </div>
                        </div>
                        <!-- Ligne de formulaire -->
                        <div class="row gx-3 mb-3">
                            <!-- Groupe de formulaire (prix d'achat) -->
                            <div class="col-md-6">
                                <label class="small mb-1">Prix d'achat</label>
                                <div class="form-control form-control-solid">{{ $product->buying_price  }}</div>
                            </div>
                            <!-- Groupe de formulaire (prix de vente) -->
                            <div class="col-md-6">
                                <label class="small mb-1">Prix de vente</label>
                                <div class="form-control form-control-solid">{{ $product->selling_price  }}</div>
                            </div>
                        </div>
                        <!-- Groupe de formulaire (stock) -->
                        <div class="mb-3">
                            <label class="small mb-1">Stock</label>
                            <div class="form-control form-control-solid">{{ $product->stock  }}</div>
                        </div>

                        <!-- Bouton Soumettre -->
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Retour</a>
                    </div>
                </div>
                <!-- FIN: Informations sur le produit -->
            </div>
        </div>
    </form>
</div>
<!-- FIN: Contenu principal de la page -->
@endsection
