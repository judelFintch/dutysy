<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
        <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Rccm</th>
                        <th>Fiche</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($clients)>0)
                    @foreach($clients as $res)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile" class="avatar"><img src="assets/img/profiles/avatar-01.jpg"
                                        alt=""></a>
                                <a href="profile">{{$res->name}}<span></span></a>
                            </h2>
                        </td>
                        <td>{{$res->type}}</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">{{$res->tel}}</a>
                        </td>
                        <td>{{$res->email}}</td>

                        <td>{{$res->rccm}}</td>
                        <td><a class="btn btn-sm btn-primary" href="salary_view">Generate Slip</a></td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a wire:click="edit({{$res->id}})" class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i>
                                        Edit</a>
                                    <a onclick="deleteCli({{$res->id}})" class="dropdown-item" href="#" data-bs-toggle="modal"
                                        data-bs-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
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