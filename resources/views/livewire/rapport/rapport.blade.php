<div>
    <div>
        <x-nav_left />
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Rapport</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dossier</li>
                            </ul>
                        </div>

                    </div>
                </div>
                   <x-filter-rapport/>
                   @include('livewire.rapport.list')
            </div>
        </div>
    </div>
</div>