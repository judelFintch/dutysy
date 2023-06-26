<table class="table table-striped custom-table datatable">
            <thead>
                <tr>
                    <th>#id</th>
                    <th>Montant</th>
                    <th>Motif</th>
                    <th>observation</th>
                    <th class="text-end">bénéficiaire</th>
                    <th class="text-end">user</th>
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
                    <td>{{ $doss->user_id }}</td>
                    <td>
                        <a class="badge bg-inverse-success">restaurer</a>
                        
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