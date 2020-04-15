<?php

namespace maksim;
class LinearEq
{
    function solvel($a, $b)
    {
        //aX+b=0
        //x=-b/a
        if ($a == 0) {
            throw new MaksimException("Equation does not exist");
        }

        $x = (-1 * $b) / $a;
        $this->x = $x;
        Log::log("Linear equation ($a x+$b) root: $x");
        return $x;

    }
}