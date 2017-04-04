<?php
namespace task\Model;

class PasswordGenerator
{
    private $length;
    private $numbers;
    private $lowercase;
    private $uppercase;

    private $characterPools = [
        'numbers' => '23456789',
        'lowercase' => 'abcdefghijkmnpqrstuvwxyz',
        'uppercase' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ'
    ];

    function __construct($length = 8, $numbers = false, $lowercase = false, $uppercase = false)
    {
        $this->length = (int)$length;
        $this->numbers = (bool)$numbers;
        $this->lowercase = (bool)$lowercase;
        $this->uppercase = (bool)$uppercase;
    }

    public function setLength($length) {
        $this->length = (int)$length;
        return $this;
    }

    public function setNumbers($state) {
        $this->numbers = (bool)$state;
        return $this;
    }

    public function setLowercase($state) {
        $this->lowercase = (bool)$state;
        return $this;
    }

    public function setUppercase($state) {
        $this->uppercase = (bool)$state;
        return $this;
    }

    public function generate() {
        if ($this->numbers || $this->lowercase || $this->uppercase && $this->length) {
            $pools = [];
            $password = [
                'pools' => '',
                'string' => ''
            ];
            if ($this->numbers) {
                $pools[] = $this->characterMaps['numbers'];
            }
            if ($this->lowercase) {
                $pools[] = $this->characterMaps['lowercase'];
            }
            if ($this->uppercase) {
                $pools[] = $this->characterMaps['uppercase'];
            }

            for ($i = 0; $i < $this->length; $i++) {
                $pool = $this->secureDecimal() % count($pools);
                $char = $this->secureDecimal() % strlen($pools[$pool]);

                $password['pools'] .= $pool;
                $password['string'] .= $pools[$pool][$char];
            }

            while (strlen(count_chars($password['pools'], 3)) < min(count($pools), $this->length)) {
                $pool = $this->secureDecimal() % count($pools);
                $char = $this->secureDecimal() % strlen($pools[$pool]);

                $password['pools'] = substr($password['pools'], 1);
                $password['string'] = substr($password['string'], 1);

                $password['pools'] .= $pool;
                $password['string'] .= $pools[$pool][$char];
            }

            return $password['string'];
        }
        else {
            return "";
        }
    }

    private function secureDecimal($bitLength = 1) {
        return unpack('C*' ,openssl_random_pseudo_bytes($bitLength))[1];
    }
}
