<?php 

    namespace Learn\Model;

    class Question {

        public function question2(){

             $expectValue = $this->getExpectValue(' ( y + 24 ) + ( 10 * 2 ) = 99');
             $positiveNum = $this->getDiff( 10, $expectValue );
             $negativeNum = $this->getDiff(-10, $expectValue );
             $closestType = $this->getClosestZeroType($positiveNum,$negativeNum);
             $result      = $this->getResult($closestType, $expectValue);

           

            return $result ;
        }

        public function getExpectValue($equationStringWithResult){
            // ( y + 24 ) + ( 10 * 2 ) = 99 
            $explodeTemp = explode("=",$equationStringWithResult);
            $expectResult = $explodeTemp[1];
            $expectResult = (int)$expectResult;
            return $expectResult;
            // return 99;
        }

        public function getDiff($testNumber,$expectValue){
            $number             =  $testNumber;
            $equationString     =  $this->getEquationString($number);
            $diff = eval('return '.$equationString.';');
            $diff = $diff - $expectValue;
            return abs($diff);
            // return diff
        }

        public function getClosestZeroType($positiveNum,$negativeNum){
            if($positiveNum > $negativeNum){
                return "negClosest";
            }else{
                return "posClosest";
            }
        }

        public function getResult($closestType,$expectValue){
            switch($closestType)
            {
                case 'posClosest':
                    for($i=0;$i<100000;$i++){
                            $equationString = $this->getEquationString($i);
                            $result = eval('return '.$equationString.';');
                            if($result == $expectValue){
                                return $i;
                            }
                    }
                break;
                case 'negClosest':
                for($i=0;$i > -100000;$i--){
                    $equationString = $this->getEquationString($i);
                    $result = eval('return '.$equationString.';');
                    if($result == $expectValue){
                        return $i;
                    }
            }            
                break;
                default:
                echo "Error";
            }
        }

        public function getEquationString($number){
            $string = "( y + 24 ) + ( 10 * 2 )";
            $equationString = str_replace("y",$number,$string);
            return $equationString;
        }
    }