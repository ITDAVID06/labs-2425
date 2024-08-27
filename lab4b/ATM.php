<?php
class ATM {
    public $location;
    public $managedBy;

    public function identifies() {
        return false;
    }

    public function transactions() {
        return false;
    }
}
?>
