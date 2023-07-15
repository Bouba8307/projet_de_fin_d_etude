@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- DÉBUT: En-tête -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        Importer un produit
                    </h1>
                </div>
            </div>

            <nav class="mt-4 rounded" aria-label="breadcrumb">
                <ol class="breadcrumb px-3 py-2 rounded mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active">Importation</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
<!-- FIN: En-tête -->

<!-- DÉBUT: Contenu de la page principale -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('products.handleImport') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <!-- Importation des produits -->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Importer un produit</div>
                    <div class="card-body">
                        <!-- Champ d'importation du produit -->
                        <input class="form-control form-control-solid mb-3 @error('file') is-invalid @enderror" type="file"  id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <button class="btn btn-primary" type="submit">Importer</button>
                        @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <!-- Importation des produits -->
            </div>
        </div>
    </form>
</div>
<!-- FIN: Contenu de la page principale -->
@endsection
