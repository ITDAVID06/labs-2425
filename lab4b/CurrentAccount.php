<?php
require 'Account.php';

class CurrentAccount extends Account {
    public $accountNumber;
    public $balance;

    public function withdraw() {
        return false;
    }
}
?>
