<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;

class transactionsController
{
    public function index()
    {
        $filename = __DIR__ . '/../../transactions_sample.csv';

        if (file_exists($filename)) {

            $handle = fopen($filename, 'r');

            if ($handle !== false) {

                $rows = [];

                while (($data = fgetcsv($handle)) !== false) {

                    $rows[] = $data;
                }
                $rows = array_slice($rows, 1);

                $totalIncome = 0;
                $totalExpense = 0;

                foreach ($rows as $row) {

                    $amount = floatval(str_replace(['$', ','], '', $row[3]));

                    if ($amount > 0) {
                        $totalIncome += $amount;
                    } else {
                        $totalExpense += abs($amount);
                    }
                }

                return View::make('transactions', [
                    'rows' => $rows,
                    'totalIncome' => $totalIncome,
                    'totalExpense' => $totalExpense,
                    'netTotal' => $totalIncome - $totalExpense,
                ]);

                fclose($handle);
            } else {
                echo "Error opening the file.";
            }
        } else {
            echo "File does not exist: " . $filename;
        }
    }
}
