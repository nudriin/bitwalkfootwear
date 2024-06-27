<?php
namespace Devina\KerupukJulak\Repository;

use Devina\KerupukJulak\Domain\DetailTransactions;
use PDO;

class DetailTransactionsRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(DetailTransactions $detailTransactions) : DetailTransactions
    {
        $stmt = $this->connection->prepare("INSERT INTO detail_transactions (id, transaction_id, quantity, products_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$detailTransactions->id, $detailTransactions->transaction_id, $detailTransactions->quantity, $detailTransactions->products_id]);

        return $detailTransactions;
    }

    //  * USE VIEWS
    public function findByAccountId(string $account_id) : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_transaction_details_by_acc WHERE account_id = ?');
        $stmt->execute([$account_id]);
        if($stmt->rowCount() > 0){
            return $stmt->fetch();
        } else{
            return null;
        }
    }

    //  * USE VIEWS
    public function findAllByAccountId(string $account_id) : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_all_transaction_details_by_acc WHERE account_id = ?;');
        $stmt->execute([$account_id]);
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    
    //  * USE VIEWS
    public function findAll() : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_transaction_details;');
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    
    //  * USE VIEWS
    public function findAllByDate(string $start_date, string $end_date) : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_transaction_details WHERE transaction_time BETWEEN ? AND ?');
        $stmt->execute([$start_date, $end_date]);
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
    
    //  * USE VIEWS
    public function findAllHistory() : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_all_transaction_details_by_acc ORDER BY transaction_time DESC');
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }

    public function findAllDetail(string $id) : ?array
    {
        $stmt = $this->connection->prepare('SELECT * FROM show_all_transaction_details_by_acc WHERE tr_id = ? ORDER BY transaction_time DESC;
        ');
        $stmt->execute([$id]);
        if($stmt->rowCount() > 0){
            return $stmt->fetchAll();
        } else{
            return null;
        }
    }
}