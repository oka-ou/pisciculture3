<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test PHP</title>
    </head>
    <body>       
       <?php 
       $arrCoord = array(
           'prenom' => 'Gwénaël',
           'nom' => 'Laurent',
           'age' => 46,
           'adresse' => '96 rue Jules Lebleu',
           'ville' => 'Armentières', 
           'mariee' => 'Jeanne');
       
       array_unshift($arrCoord, "pomme");
        $arrCoord['codepostale'] = '62118';
        
              
        echo $arrCoord['prenom']." ".$arrCoord['nom']."<br/>"; 
        echo $arrCoord['adresse']." ".$arrCoord['ville']."<br/>"; 
        echo "Age : ".$arrCoord['age']."<br/>"; 
        echo "Mariée : ".$arrCoord['mariee']."<br/>"; 
        echo "Code postale :".$arrCoord['codepostale'];
        ?> 
    </body>
</html>
