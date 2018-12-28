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


        public function question1($currentData){

                return $this->findNextAlphabet($currentData);

        }

        public function findNextAlphabet($currentData){

          


            // Rule : ((currentPostion + 1) * 2) + currentValue ); 
            
             $nextData = [];
             $currentData = $currentData; 
             $sizeOfArray = sizeof($currentData);

           
             $lastValue   = end($currentData);
            // // cast to intger;
             $lastValue  = (int)$lastValue ;
             $nextValue   = ($sizeOfArray * 2) + $lastValue;
             array_push($currentData,$nextValue);
             $startData   = $currentData;
             return $startData;
            
            // return view('test.question1',['startData' => $startData]);


        }

        public function question3($currentData){


                $startData = $this->getThenValue($currentData);
                return $startData;


        }

        public function getThenValue($currentData){
            $currentData =    $currentData;
            $lastkey     =    $this->getlastKey($currentData);
            $lastValue   = $currentData[$lastkey];
            $nextKey     = (int) $lastkey + 1;
            $nextValue   =  (string)$nextKey.(string)$lastValue;
            $currentData[$nextKey] = $nextValue ;
            $startData = $currentData;
            
            return $startData;
            
        }


        public function getlastKey($currentData){
  
            end($currentData);
            $lastkey = key($currentData); 
            return $lastkey;
           
        }
    


    }