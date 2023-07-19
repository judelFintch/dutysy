<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
<table class="table table-striped custom-table datatable">
    <thead>
        <tr>
            <th>Plaque</th>
            <th>Solde</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($compile as $doss)
        <tr>
            <td>{{ $doss->plaque }}</td>
            <td>{{ $doss->solde }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
