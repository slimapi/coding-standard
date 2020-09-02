<?php

class MultipleEmptyLines
{
    public function foo()
    {
        $a = 1;


        $b = 2;
    }


    private function bar()
    {

    }

    private function method()
    {
        $a = 1;



        $b = 2;
    }
}
