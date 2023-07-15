@extends('auth.body.main')

@section('content')

<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light mb-3">Se connecter</div>
                    <!-- BEGIN: Liens de connexion via les réseaux sociaux -->
                    <a class="btn btn-icon btn-facebook mx-1" href="#"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-github mx-1" href="#"><i class="fab fa-github fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-google mx-1" href="#"><i class="fab fa-google fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-twitter mx-1" href="#"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>
                    <!-- END: Liens de connexion via les réseaux sociaux -->
                </div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <!-- BEGIN: Formulaire de connexion -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Groupe de formulaire (adresse e-mail/nom d'utilisateur) -->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="input_type">E-mail / Nom d'utilisateur</label>
                            <input
                                class="form-control form-control-solid @if($errors->get('email') OR $errors->get('username')) is-invalid @endif"
                                type="text"
                                id="input_type"
                                name="input_type"
                                placeholder=""
                                value="{{ old('input_type') }}"
                                autocomplete="off"
                            />
                            @if ($errors->get('email') OR $errors->get('username'))
                                <div class="invalid-feedback">
                                    Nom d'utilisateur ou mot de passe incorrect.
                                </div>
                            @endif
                        </div>
                        <!-- Groupe de formulaire (mot de passe) -->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password">Mot de passe</label>
                            <input
                                class="form-control form-control-solid @if($errors->get('email') OR $errors->get('username')) is-invalid @endif @error('password') is-invalid @enderror"
                                type="password"
                                id="password" name="password"
                                placeholder=""
                            />
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Groupe de formulaire (lien de mot de passe oublié) -->
                        <div class="mb-3"><a class="small" href="#">Mot de passe oublié ?</a></div>
                        <!-- Groupe de formulaire (boîte de connexion) -->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <div class="form-check">
                                <input class="form-check-input" id="remember_me" name="remember" type="checkbox" />
                                <label class="form-check-label" for="remember_me">Se souvenir de moi.</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Connexion</button>
                        </div>
                    </form>
                    <!-- END: Formulaire de connexion -->
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        Vous n'avez pas de compte ?
                        <a href="{{ route('register') }}">Créez un compte !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection