<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $row): ?>
                    <?php if (!is_string($row)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row[0]); ?></td>
                            <td><?php echo htmlspecialchars($row[1]); ?></td>
                            <td><?php echo htmlspecialchars($row[2]); ?></td>
                            <td class="<?php echo substr($row[3], 0, 1) == '-' ? 'red' : 'green'; ?>">
                                <?php echo htmlspecialchars($row[3]); ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No transactions available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td>$<?= $totalIncome ?> </td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td>-$<?= $totalExpense ?> </td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td>$<?= $netTotal ?> </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>