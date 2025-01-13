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
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
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
