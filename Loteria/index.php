<?php
//index.php
class App
{
    public function __construct()
    {
        session_start();
    }
    public function tabla()
    {
        
        $contador = 1;

        echo "<table>";
        for ($i=0; $i < 7 ; $i++) { 
            echo "<tr>";
            for ($x=0; $x < 7; $x++) { 
                if(isset($_SESSION['apuesta'][$contador])){
                    unset($_SESSION['apuesta'][$contador]);
                    
                }else{
                    $_SESSION['apuesta'][$contador]=$contador;
                }
                if (isset($_SESSION['apuesta'][$contador])) {
                    $class = 'apuesta';
                } else {

                    $class = 'noapostado';
                }
                echo '<td> <a  href="?method=tabla&number= '.$contador.'" class = "' . $class . '" />  '.$contador.'</td>';
                
                $contador ++;
            }
            echo "</tr>";

        }
        echo "</table>";
       
        require('vista.php');
    }
    public function reiniciar()
    {
        session_destroy();
        unset($_SESSION['apuesta']);
        header('Location: /Loteria') ;
        
        
    }
   
   
}
$app = new App();
if (isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'tabla';
}

$app->$method();



