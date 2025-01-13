<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport des Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        header .company-info {
            text-align: center;
        }

        header .company-info h1 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        header .company-info p {
            margin: 5px 0;
            font-size: 12px;
            color: #555;
        }

        header .logo img {
            height: 60px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header>
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo">
        </div>
        <!-- Company Information -->
        <div class="company-info">
            <h1>{{ $company->name }}</h1>
            <p>Adresse : {{ $company->address }}</p>
            <p>Téléphone : {{ $company->phone }} | Email : {{ $company->email_primary }}</p>
            <p>N° Registre de Commerce : {{ $company->rccm }} | N° Fiscal : {{ $company->nif }}</p>
            <p>Site Web : <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            <p>Généré le : {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>
    </header>

    <!-- Report Table -->
    <h2>Rapport des Transactions</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Montant</th>
                <th>Devise</th>
                <th>Type</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->fromAccount->name_caisse ?? 'N/A' }}</td>
                    <td>{{ $transaction->toAccount->name_caisse ?? 'N/A' }}</td>
                    <td>{{ number_format($transaction->amount, 2) }}</td>
                    <td>{{ $transaction->currency }}</td>
                    <td>{{ ucfirst($transaction->transaction_type) }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                    <td>{{ $transaction->processed_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
