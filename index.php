<?php



class Robot1
{
    public $type = 'robot1';
    public $weight = 0;
    public $speed = 0;
    public $height = 0;
    
    public function __construct($data=array()) {
        foreach($data as $key => $val) $this->$key = $val;
    }
    
    public function getParams($paramName){
        if(isset($this->$paramName)) return $this->$paramName;
        else return '';
    }
}



class Robot2
{
    public $type = 'robot2';
    public $weight = 0;
    public $speed = 0;
    public $height = 0;
    
    public function __construct($data=array()) {
        foreach($data as $key => $val) $this->$key = $val;
    }
    
    public function getParams($paramName){
        if(isset($this->$paramName)) return $this->$paramName;
        else return '';
    }
}




class FactoryRobot
{
    public $robots = array();
    
    public function addType($obj){
        $this->robots[] = array(
            'type' => $obj->type,
            'weight' => $obj->weight,
            'speed' => $obj->speed,
            'height' => $obj->height,
        );
        
        return $this;
    }
    
    public function search($search){
        $finded = array();
        foreach($this->robots as $array){ 
            $key = array_search($search, $array);
            if($key!==FALSE) $finded[] = $array; 
        }
        if(count($finded)) return $finded;
        else return false;
    }
    
    public function getSpeed($searchResult = array()){
	    $finded;
        if(count($searchResult)) foreach($searchResult as $array) $finded[] = $array['speed'];
        else foreach($this->robots as $array) $finded[] = $array['speed'];
		$speed = min($finded);
		
        return $speed;
       
    }
    
    public function getWeight($searchResult = array()){
        $weight = 0;
        if(count($searchResult)) foreach($searchResult as $array) $weight += $array['weight'];
        else foreach($this->robots as $array) $weight += $array['weight'];
        return $weight;
    }
}





$factory = new FactoryRobot();

//Добавление роботов


$factory->addType(new Robot1(array(
        'type' => 'robot1',
        'weight' => 250.1,
        'speed' => 20,
        'height' => 70
    )));
	

$factory->addType(new Robot2(array(
        'type' => 'robot2',
        'weight' => 180.5,
        'speed' => 12,
        'height' => 90.2
    )));
	
	
	
    

$searchRobots = $factory->search('robot1'); //Вывидет массив всех роботов по типу

echo "getSpeed: {$factory->getSpeed()} <br>"; //Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
echo "getWeight: {$factory->getWeight()} <br>"; //Результатом роботи методу буде сума всіх ваг об’єднаних роботів


$allRobots = $factory->robots; //Массив всех роботов
//print_r($searchRobots);




?>
