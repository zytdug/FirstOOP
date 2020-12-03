<form action="index.php" method="post">
  <input type="text" name="name">
  <input type="text" name="surname">
  <button type="submit">Отправить</button>
</form>
<?php

abstract class naming
{
  public $name= 'Ivan';
  public $surname= 'Ivanov';

  abstract public function NamingProcess($name, $surname);

  public function getHello($name = '', $surname = '') {
    echo $this->NamingProcess($name, $surname);
  }
}


class HelloUser extends naming
{
  private $hello;    
 
  public function NamingProcess($name, $surname) {
    if(!empty($name)) $this->name = $name;
    if(!empty($surname)) $this->surname = $surname;

    $this->hello = $this->name. " ". $this->surname;

    return 'Hello '. $this->hello. '. ';
  }
}

class Vovaname extends naming
{
  public $RealName = 'Vova';
  public $RealSurname = 'Vovin';

  public function NamingProcess($name, $surname) {
    if(!empty($name)) $this->name = $name;
    if(!empty($surname)) $this->surname = $surname;

    return 'No you are not '. $this->name . ' '. $this->surname . '. You are '. $this->RealName. ' '. $this->RealSurname. '.';
  }

  public function Hello($name, $surname) {
    return  $this->getHello($name, $surname);
  }
}


$a = new HelloUser;
echo $a->getHello($_POST['name'], $_POST['surname']);

echo '<br>---------------------------<br>';

$b = new Vovaname;
echo $b->Hello($_POST['name'], $_POST['surname']);

?>