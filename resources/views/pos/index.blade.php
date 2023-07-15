@extends('dashboard.body.main')

@section('specificpagescripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endsection

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                        Point de Vente
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- END: Header -->

<!-- BEGIN: Alert -->
<div class="container-xl px-4">
    @if (session()->has('success'))
    <div class="alert alert-success alert-icon" role="alert">
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Fermer"></button>
        <div class="alert-icon-aside">
            <i class="far fa-flag"></i>
        </div>
        <div class="alert-icon-content">
            {{ session('success') }}
        </div>
    </div>
    @endif
</div>

<!-- END: Alert -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-4">
    <div class="row">

        <!-- DÉBUT : Section de gauche -->
        <div class="col-xl-6">
            <!-- DÉBUT : Panier -->
            <div class="card mb-4">
                <div class="card-header">
                    Panier
                </div>
                <div class="card-body">
                    <!-- DÉBUT : Tableau du panier -->
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">QTE</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Sous-total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td style="min-width: 170px;">
                                        <form action="{{ route('pos.updateCartItem', $item->rowId) }}" method="POST">
                                            @csrf
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="qty" required value="{{ old('qty', $item->qty) }}">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-success border-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Valider"><i class="fas fa-check"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->subtotal }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('pos.deleteCartItem', $item->rowId) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- FIN : Tableau du panier -->

                    <!-- Ligne du formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (produit total) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Total de produits</label>
                            <div class="form-control form-control-solid fw-bold text-red">{{ Cart::count() }}</div>
                        </div>
                        <!-- Groupe de formulaire (sous-total) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Sous-total</label>
                            <div class="form-control form-control-solid fw-bold text-red">{{ Cart::subtotal() }}</div>
                        </div>
                    </div>
                    <!-- Ligne du formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (taxe) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Taxe</label>
                            <div class="form-control form-control-solid fw-bold text-red">{{ Cart::tax() }}</div>
                        </div>
                        <!-- Groupe de formulaire (total) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Total</label>
                            <div class="form-control form-control-solid fw-bold text-red">{{ Cart::total() }}</div>
                        </div>
                    </div>
                    <!-- Groupe de formulaire (client) -->

                    <form action="{{ route('pos.createInvoice') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="small mb-1" for="customer_id">Client <span class="text-danger">*</span></label>
                                <select class="form-select form-control-solid @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id">
                                    <option selected="" disabled="">Sélectionnez un client :</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" @if(old('customer_id') == $customer->id) selected="selected" @endif>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                                <!-- Bouton de soumission -->
                            <div class="col-md-12 mt-4">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
                                    <a href="{{ route('customers.create') }}" class="btn btn-primary add-list mx-1">Ajouter un client</a>
                                    <button type="submit" class="btn btn-success add-list mx-1">Créer la facture</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FIN : Panier -->
        </div>
        <!-- FIN : Section de gauche -->


        <!-- DÉBUT : Section de droite -->
        <div class="col-xl-6">
            <!-- Carte d'image du produit -->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Liste des produits</div>

                <div class="card-body">
                    <!-- DÉBUT : Recherche de produits -->
                    <div class="col-lg-12">
                        <form action="{{ route('pos.index') }}" method="GET">
                            <div class="d-flex flex-wrap align-items-center justify-content-between">
                                <div class="form-group row align-items-center">
                                    <label for="row" class="col-auto">Ligne :</label>
                                    <div class="col-auto">
                                        <select class="form-control" name="row">
                                            <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                                            <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                                            <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                                            <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center justify-content-between">
                                    <label class="control-label col-sm-3" for="search">Recherche :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" id="search" class="form-control me-1" name="search" placeholder="Rechercher un produit" value="{{ request('search') }}">
                                            <div class="input-group-append d-flex">
                                                <button type="submit" class="input-group-text bg-primary"><i class="fa-solid fa-magnifying-glass font-size-20 text-white"></i></button>
                                                <a href="{{ route('pos.index') }}" class="input-group-text bg-danger"><i class="fa-solid fa-trash font-size-20 text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- FIN : Recherche de produits -->

                    <!-- DÉBUT : Liste des produits -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">@sortablelink('product_name', 'Nom')</th>
                                        <th scope="col">@sortablelink('stock')</th>
                                        <th scope="col">@sortablelink('unit.name', 'unité')</th>
                                        <th scope="col">@sortablelink('selling_price', 'Prix')</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr>
                                        <th scope="row">{{ (($products->currentPage() * (request('row') ? request('row') : 10)) - (request('row') ? request('row') : 10)) + $loop->iteration  }}</th>
                                        {{-- <td>
                                        <div style="max-height: 80px; max-width: 80px;">
                                            <img class="img-fluid"  src="{{ $product->product_image ? asset('storage/products/'.$product->product_image) : asset('assets/img/products/default.webp') }}">
                                        </div>
                                        </td> --}}
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->unit->name }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('pos.addCartItem', $product->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                    <input type="hidden" name="price" value="{{ $product->selling_price }}">

                                                    <button type="submit" class="btn btn-outline-primary btn-sm">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <th colspan="6" class="text-center" >
                                            Données non trouvées !
                                        </th>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- FIN : Liste des produits -->

                    <!-- DÉBUT : Pagination -->
                    <div class="col-lg-12">
                        {{ $products->links() }}
                    </div>
                    <!-- FIN : Pagination -->
                </div>
            </div>
        </div>
        <!-- FIN : Section de droite -->
    </div>
</div>

@endsection
