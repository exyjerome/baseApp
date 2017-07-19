<?php

class Homepage extends Controller_Base 
{
    public function show ()
    {
        echo $this->partial('Shared@header');
    }

}