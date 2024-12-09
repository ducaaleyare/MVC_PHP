<?php

declare(strict_types=1);

use App\Model;

class transactions extends Model
{
    public function __construct()
    {
        // Initialize the parent class properly
        parent::__construct();
    }

    public static function create(array $data)
    {
        // Assuming $this->db is available and is a PDO instance
        $sql = 'INSERT INTO transactions (date, check_number, description, amount) VALUES (:date, :check_number, :description, :amount)';

        $stmt = $this->db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':check_number', $data['check_number']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':amount', $data['amount']);

        // Execute the statement
        return $stmt->execute();
    }
}
