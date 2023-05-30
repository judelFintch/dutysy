<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Date</th>
                        <th>Plaque</th>
                        <th>Montant</th>
                        <th>Detail</th>
                        <th>Detail</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($dossiers)>0)
                    
                    @foreach ($dossiers as $doss)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                       
                        <td>{{ $doss->created_at }}</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">{{ $doss->plaque }}</a>
                        </td>
                       
                        <td>{{ $doss->destination->destination }}</td>
                        <td>{{ $doss->montant_init }}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{route('details.mvt',['id'=>$doss->id])}}">Detail</a></td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a wire:click.prevent="edit({{ $doss->id }})" class="dropdown-item" href="#"
                                        data-bs-toggle="modal" data-bs-target="#edit_salary"><i
                                            class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a wire:click.prevent="destroy({{ $doss->id }})" class="dropdown-item" href="#"
                                        data-bs-toggle="modal" data-bs-target="#delete_salary"><i
                                            class="fa fa-trash-o m-r-5"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td> Aucune Donnee</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteCli(id) {
        if (confirm("Etes vous sur de supprimer cette enregistrement"))
            window.livewire.emit('deleteCli', id);
    }
</script>