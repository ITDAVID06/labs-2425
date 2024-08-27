<?php
class ATMTransactions {
    public $transactionId;
    public $date;
    public $type;
    public $amount;
    public $postBalance;

    public function modifies() {
        return false;
    }
}
?>
