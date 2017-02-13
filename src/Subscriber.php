<?php

/**
 * Description of Subscriber
 *
 * @author bjoern.bass@esfl.de
 */
class Subscriber {
    public $ID_Subscriber;
    public $fistName;
    public $lastName;
    public $email;
    private $db;

    public function __construct(Db &$db)
    {
        $this->db = $db;
    }
   
}
