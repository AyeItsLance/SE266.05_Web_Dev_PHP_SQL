<?php
    abstract class Account {
        protected $accountId, $balance, $startDate;
        
        public function __construct ($id, $b, $sd) {
           $this->accountId = $id;
           $this->balance = $b;
           $this->startDate = $sd;
        }
        public function deposit ($amount) {
            $total = $b + $amount;

            return $total;
        }

        public function setAccountID ($id) {
            $this->accountId = $id;
        }
    
        public function setBalance ($b) {
            $this->balance = $b;
        }

        public function setStartDate ($sd) {
            $this->startDate = $sd;
        }

        abstract public function withdrawal($amount); 
        // this is an abstract method. This method must be defined in all classes
        // that inherit from this class
        public function getStartDate() {
            return $this->startDate;
        }

        public function getBalance() {
            return $this->balance;       //returning my balance
        }

        public function getAccountId() {
            return $this->accountId;       //returning my accountID
        }

        protected function getAccountDetails() {
          return "ACCOUNT ID:" .$this->accountId . "<br> BALANCE: $" . $this->balance . "<br>START DATE:
          " . $this->startDate;
        }
    }

    class CheckingAccount extends Account {
        const OVERDRAW_LIMIT = -200;

        public function withdrawal($amount) {
            $total = $this->balance  - $amount;

            $this->balance = $total;

            if($total <= -200)

            {
                $this->balance = -200;

                echo '<br>You may not withdraw anymore! A fee will be mailed to you!';
            }
            

            return $this->balance;

        }

        public function deposit($amount) {

            $total = $this->balance + $amount;

          

            $this->balance = $total;
            
            

            return $this->balance;
        }

        //freebie. I am giving you this code.
        public function getAccountDetails() {
            $str = "<h2>Checking Account</h2>";
            $str .= parent::getAccountDetails();
            
            return $str;
        }
    }

    class SavingsAccount extends Account {

        public function withdrawal($amount) {
            $total = $this->balance  - $amount;

            $this->balance = $total;

            if($total <= 0)

            {
                $this->balance = 0;

                echo '<br>You may not withdraw anymore! Theres no money!';
            }
            

            return $this->balance;
        }

        public function deposit($amount) {

            $total = $this->balance + $amount;

          

            $this->balance = $total;
            
            

            return $this->balance;
        }

        public function getAccountDetails() {
            $str = "<h2>Savings Account</h2>";
            $str .= parent::getAccountDetails();
            
            return $str;
           // look at how it's defined in other class. You should be able to figure this out ...
        }
    }

    
    $checking = new CheckingAccount ('C123', 1000, '12-20-2019');
    

    $savings = new SavingsAccount('S123', 5000, '03-20-2020');
    
   
    
    
?>
