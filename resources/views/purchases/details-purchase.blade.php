@section('content')
    <!-- BEGIN: Informations fournisseur -->
    <div class="col-xl-12">
        <div class="card mb-4">
            <div class="card-header">
                Informations fournisseur
            </div>
            <div class="card-body">
                <!-- Ligne de formulaire -->
                <div class="row gx-3 mb-3">
                    <!-- Groupe de formulaire (nom du fournisseur) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Nom</label>
                        <div class="form-control form-control-solid">{{ $purchase->supplier->name }}</div>
                    </div>
                    <!-- Groupe de formulaire (email du fournisseur) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Email</label>
                        <div class="form-control form-control-solid">{{ $purchase->supplier->email }}</div>
                    </div>
                </div>
                <!-- Ligne de formulaire -->
                <div class="row gx-3 mb-3">
                    <!-- Groupe de formulaire (numéro de téléphone du fournisseur) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Téléphone</label>
                        <div class="form-control form-control-solid">{{ $purchase->supplier->phone }}</div>
                    </div>
                    <!-- Groupe de formulaire (date de commande) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Date de commande</label>
                        <div class="form-control form-control-solid">{{ $purchase->purchase_date }}</div>
                    </div>
                </div>
                <!-- Ligne de formulaire -->
                <div class="row gx-3 mb-3">
                    <!-- Groupe de formulaire (numéro de facture) -->
                    <div class="col-md-6">
                        <label class="small mb-1">N° d'achat</label>
                        <div class="form-control form-control-solid">{{ $purchase->purchase_no }}</div>
                    </div>
                    <!-- Groupe de formulaire (montant total) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Total</label>
                        <div class="form-control form-control-solid">{{ $purchase->total_amount }}</div>
                    </div>
                </div>
                <!-- Ligne de formulaire -->
                <div class="row gx-3 mb-3">
                    <!-- Groupe de formulaire (créé par) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Créé par</label>
                        <div class="form-control form-control-solid">{{ $purchase->user_created->name }}</div>
                    </div>
                    <!-- Groupe de formulaire (mis à jour par) -->
                    <div class="col-md-6">
                        <label class="small mb-1">Mis à jour par</label>
                        <div class="form-control form-control-solid">{{ $purchase->user_updated ? $purchase->user_updated->name : '-' }}</div>
                    </div>
                </div>
                <!-- Groupe de formulaire (adresse) -->
                <div class="mb-3">
                    <label  class="small mb-1">Adresse</label>
                    <div class="form-control form-control-solid">{{ $purchase->supplier->address }}</div>
                </div>

                @if ($purchase->purchase_status == 0)
                <form action="{{ route('purchases.updatePurchase') }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id" value="{{ $purchase->id }}">
                    <!-- Bouton Soumettre -->
                    <button type="submit" class="btn btn-success" onclick="return confirm('Êtes-vous sûr de vouloir approuver cet achat ?')">Approuver l'achat</button>
                    <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
                </form>
                @else
                <a class="btn btn-primary" href="{{ URL::previous() }}">Retour</a>
                @endif
            </div>
        </div>
    </div>
    <!-- END: Informations fournisseur -->


    <!-- BEGIN: Tableau de produits -->
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
                                    <th scope="col">Stock actuel</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchaseDetails as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration  }}</td>
                                    <td scope="row">
                                        <div style="max-height: 80px; max-width: 80px;">
                                            <img class="img-fluid"  src="{{ $item->product->product_image ? asset('storage/products/'.$item->product->product_image) : asset('assets/img/products/default.webp') }}">
                                        </div>
                                    </td>
                                    <td scope="row">{{ $item->product->product_name }}</td>
                                    <td scope="row">{{ $item->product->product_code }}</td>
                                    <td scope="row"><span class="btn btn-warning">{{ $item->product->stock }}</span></td>
                                    <td scope="row"><span class="btn btn-success">{{ $item->quantity }}</span></td>
                                    <td scope="row">{{ $item->unitcost }}</td>
                                    <td scope="row">
                                        <span  class="btn btn-primary">{{ $item->total }}</span>
                                    </td>
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
    <!-- END: Tableau de produits -->
</div>
</div>
<!-- END: Main Page Content -->
@endsection
