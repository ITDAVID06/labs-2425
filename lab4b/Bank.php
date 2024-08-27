<?php
class Bank {
    public $code;
    public $address;

    public function manages() {
        return false;
    }

    public function maintains() {
        return false;
    }
}
?>