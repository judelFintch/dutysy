<x-app-layout>
    <div class="page-wrapper">
        @include('partials.nav_left')
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sortie Argent</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Argent</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_salary"><i
                                class="fa fa-plus"></i> Nouvelle Caisse</a>
                    </div>
                </div>
            </div>


          
        </div>
    </div>

</x-app-layout>
