<?php

class RetornoProdutos
{

    public $gas;
    public $agua;

    public function getGas()
    {
        return $this->gas;
    }

    public function setGas($gas)
    {
        $this->gas = $gas;
    }

    public function getAgua()
    {
        return $this->agua;
    }

    public function setAgua($agua)
    {
        $this->agua = $agua;
    }
}
