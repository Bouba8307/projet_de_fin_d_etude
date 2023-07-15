@extends('dashboard.body.main')

@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-xl px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
                        Détails de la commande
                    </h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Contenu principal de la page -->
<div class="container-xl px-4">
    <div class="row">

        <!-- BEGIN: Informations sur le client -->
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    Informations sur le client
                </div>
                <div class="card-body">
                    <!-- Ligne de formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (nom du client) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Nom</label>
                            <div class="form-control form-control-solid">{{ $order->customer->name }}</div>
                        </div>
                        <!-- Groupe de formulaire (email du client) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Email</label>
                            <div class="form-control form-control-solid">{{ $order->customer->email }}</div>
                        </div>
                    </div>
                    <!-- Ligne de formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (numéro de téléphone du client) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Téléphone</label>
                            <div class="form-control form-control-solid">{{ $order->customer->phone }}</div>
                        </div>
                        <!-- Groupe de formulaire (date de commande) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Date de commande</label>
                            <div class="form-control form-control-solid">{{ $order->order_date }}</div>
                        </div>
                    </div>
                    <!-- Ligne de formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (numéro de facture) -->
                        <div class="col-md-6">
                            <label class="small mb-1">N° de facture</label>
                            <div class="form-control form-control-solid">{{ $order->invoice_no }}</div>
                        </div>
                        <!-- Groupe de formulaire (type de paiement) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Type de paiement</label>
                            <div class="form-control form-control-solid">{{ $order->payment_type }}</div>
                        </div>
                    </div>
                    <!-- Ligne de formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (montant payé) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Montant payé</label>
                            <div class="form-control form-control-solid">{{ $order->pay }}</div>
                        </div>
                        <!-- Groupe de formulaire (montant dû) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Montant dû</label>
                            <div class="form-control form-control-solid">{{ $order->due }}</div>
                        </div>
                    </div>
                    <!-- Ligne de formulaire -->
                    <div class="row gx-3 mb-3">
                        <!-- Groupe de formulaire (taxe) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Taxe</label>
                            <div class="form-control form-control-solid">{{ $order->vat }}</div>
                        </div>
                        <!-- Groupe de formulaire (total) -->
                        <div class="col-md-6">
                            <label class="small mb-1">Total</label>
                            <div class="form-control form-control-solid">{{ $order->total }}</div>
                        </div>
                    </div>
                    <!-- Groupe de formulaire (adresse) -->
                    <div class="mb-3">
                        <label class="small mb-1">Adresse</label>
                        <div class="form-control form-control-solid">{{ $order->customer->address }}</div>
                    </div>

                    @if ($order->order_status == 'pending')
                    <form action="{{ route('order.updateOrder') }}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <!-- Bouton de soumission -->
                        <button type="submit" class="btn btn-success" onclick="return confirm('Êtes-vous sûr de vouloir finaliser cette commande ?')">Finaliser la commande</button>
                        <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
                    </form>
                    @else
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- END: Informations sur le client -->


        <!-- BEGIN: Tableau des produits -->
        <div class="col-xl-12">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Liste des produits</div>

                <div class="card-body">
                    <!-- BEGIN: Liste des produits -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Nom du produit</th>
                                        <th scope="col">Code du produit</th>
                                        <th scope="col">Quantité</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration  }}</td>
                                        <td scope="row">
                                            <div style="max-height: 80px; max-width: 80px;">
                                                <img class="img-fluid"  src="{{ $item->product->product_image ? asset('storage/products/'.$item->product->product_image) : asset('assets/img/products/default.webp') }}">
                                            </div>
                                        </td>
                                        <td scope="row">{{ $item->product->product_name }}</td>
                                        <td scope="row">{{ $item->product->product_code }}</td>
                                        <td scope="row">{{ $item->quantity }}</td>
                                        <td scope="row">{{ $item->unitcost }}</td>
                                        <td scope="row">{{ $item->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END: Liste des produits -->
                </div>
            </div>
        </div>
        <!-- END: Tableau des produits -->
    </div>
</div>
<!-- END: Contenu principal de la page -->
@endsection
