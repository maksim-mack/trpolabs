<?php
namespace maksim;
class QuadraticEq extends \maksim\LinearEq implements \core\EquationInterface
	{
		protected function discr($a,$b,$c)
		{
			//D=b^2-4ac
			$discr=pow($b,2)-4*$a*$c;		
			return $discr;
		}

		function solve($a,$b,$c)
		{
			//aX^2+bx+c=0
			//x=-b+-sqrt($discr)/2a
			
			if ($a==0) {
				return array($this->solvel($b,$c));
			}

			$x = array();
			$discr=$this->discr($a,$b,$c);
			if ($discr<0) {
				//return $x[]="Discriminant is less than zero";
				throw new MaksimException("Discriminant is less than zero");
			}
			
			if ($discr==0) 
			{
				$x[]=($b*-1)/(2*$a);
                return $x;
                //=("Quadratic equation ({$a}'x^2'+{$b}'x'+{$c}) root: {$x[0]}")
			}
			
				$x[]=(($b*-1)+sqrt($discr))/(2*$a);
				$x[]=(($b*-1)-sqrt($discr))/(2*$a);
                return $x;
                //=("Quadratic equation ({$a}'x^2'+{$b}'x'+{$c}) roots: {$x[0]}, {$x[1]}")

		}
	}