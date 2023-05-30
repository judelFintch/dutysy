<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                      
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Motif</th>
                        <th>observation</th>
                        <th class="text-end">bénéficiaire</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($mouvements)>0)
                    @foreach ($mouvements as $doss)
                    @if($doss->type == 'int')
                    <?php $tag = '<span>+</span>'?>
                    @else
                    <?php $tag = '-'?>
                    @endif
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        

                        <td>{{ date("Y-m-d", strtotime($doss->dossier->created_at)) }}
                        </td>


                        <td>

                            @if($doss->type=='int')
                            <span class="badge bg-inverse-success"> +{{ number_format($doss->montant) }} $</span>
                            @else
                            <span class="badge bg-inverse-danger"> - {{ number_format($doss->montant) }} $</span>
                            @endif

                        </td>
                        <td>{{ $doss->motif }}</td>
                        <td>{{ $doss->observation }}</td>
                        <td>{{ $doss->beneficiaire }}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a wire:click.prevent="edit({{ $doss->id }})" class="dropdown-item" href="#"
                                        data-bs-toggle="modal" data-bs-target="#edit_salary"><i
                                            class="fa fa-pencil m-r-5"></i>
                                        Transfer</a>
                                    
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