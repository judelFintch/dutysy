<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Entreprise</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Info</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('company.store') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                            Modifier</a>
                    </div>
                </div>
            </div>

            @if ($company)
                <!-- Informations disponibles -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Informations de l'Entreprise</h3>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <!-- Logo -->
                            <div class="col-md-12 text-center mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo de l'Entreprise" style="height: 80px;">
                            </div>
                        </div>
                        <div class="row">
                            <!-- Informations principales -->
                            <div class="col-md-6 mb-3">
                                <h5>Nom de l'Entreprise :</h5>
                                <p class="text-muted">{{ $company->name }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Type de Société :</h5>
                                <p class="text-muted">{{ $company->type_of_company }}</p>
                            </div>

                            <!-- Adresse -->
                            <div class="col-md-12 mb-3">
                                <h5>Adresse :</h5>
                                <p class="text-muted">{{ $company->address }}</p>
                            </div>

                            <!-- Contact -->
                            <div class="col-md-6 mb-3">
                                <h5>Téléphone :</h5>
                                <p class="text-muted">{{ $company->phone }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Site Web :</h5>
                                <p class="text-muted">
                                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                </p>
                            </div>

                            <!-- Emails -->
                            <div class="col-md-6 mb-3">
                                <h5>Email Principal :</h5>
                                <p class="text-muted">{{ $company->email_primary }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>Email Secondaire :</h5>
                                <p class="text-muted">{{ $company->email_secondary }}</p>
                            </div>

                            <!-- Détails Administratifs -->
                            <div class="col-md-6 mb-3">
                                <h5>NIF :</h5>
                                <p class="text-muted">{{ $company->nif }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <h5>RCCM :</h5>
                                <p class="text-muted">{{ $company->rccm }}</p>
                            </div>
                        </div>

                        <!-- Bouton Modifier -->
                        <div class="text-center mt-4">
                            <a href="{{ route('company.info') }}" class="btn btn-primary">Modifier les Informations</a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Pas d'informations disponibles -->
                <div class="alert alert-warning text-center">
                    <strong>Attention :</strong> Les informations de l'entreprise ne sont pas encore disponibles.
                    <a href="{{ route('company.store') }}" class="btn btn-primary mt-2">Ajouter les Informations</a>
                </div>
            @endif
        </div>
    </div>
</div>
