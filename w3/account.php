<?php
    abstract class Account {
        protected $accountId, $balance, $startDate;
        
        public function __construct ($id, $b, $sd) {
           $this->accountId = $id;
           $this->balance = $b;     //grabbing the protected variables
           $this->startDate = $sd;
        }
     

        public function setAccountID ($id) {
            $this->accountId = $id;     //creating a function that sets our vars
        }
    
        public function setBalance ($b) {
            $this->balance = $b;     //creating a function that sets our vars
        }

        public function setStartDate ($sd) {     //creating a function that sets our vars
            $this->startDate = $sd;
        }

        abstract public function withdrawal($amount); 
        // this is an abstract method. This method must be defined in all classes
        // that inherit from this class
        public function getStartDate() {
            return $this->startDate;        //returning my start date
        }

        public function getBalance() {
            return $this->balance;       //returning my balance
        }

        public function getAccountId() {
            return $this->accountId;       //returning my accountID
        }

        protected function getAccountDetails() {
            
          return "ACCOUNT ID:" .$this->accountId . "<br> BALANCE: $" . $this->balance . "<br>START DATE:
          " . $this->startDate;     //putting it all together so I can return my account status
        }
    }

    class CheckingAccount extends Account {
        const OVERDRAW_LIMIT = -200;

        public function withdrawal($amount) {
            $total = $this->balance  - $amount;

            $this->balance = $total;

            if($total <= -200)      //making it so if my total goes over -200 then it will stop there and display text

            {
                $this->balance = "<font color='red'>" .-200 . "<font color='black'>";

                echo "<br><font color='red'>You may not withdraw anymore! A fee will be mailed to you!
                <font color='black'>";
            }
            

            return $this->balance;      //if if doesnt trigger return my balance

        }

        public function deposit($amount) {      //creating my deposit function

            $total = $this->balance + $amount;

          

            $this->balance = $total;        //once its all done return the new balance
            
            

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

            $this->balance = $total;        //creating my withdraw function if balance hits 0 the number will not go into the negatives

            if($total <= 0)

            {
                $this->balance = 0;

                echo '<br>You may not withdraw anymore! Theres no money!';
            }
            

            return $this->balance;
        }

        public function deposit($amount) {

            $total = $this->balance + $amount;

          

            $this->balance = $total;        //same as before deposit function
            
            

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

    //ask for help prof
    

    $savings = new SavingsAccount('S123', 5000, '03-20-2020');


    //finsihed result onoe weird errorr ask prof monday!!
    
   
    
    
?>
