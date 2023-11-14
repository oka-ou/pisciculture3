<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php $titleOnglet = "New Bassins"; ?>
<?php ob_start(); ?>
<article>                
    <h1>New bassins</h1>  
    <form action="insertbassin.php" method="POST">
        Nom de Bassin:<br>
        <input type="text" name="newbassin">
        <br>
        Déscriptions:<br>
        <input type="text" name="description">
        <br><br>
        <input type="submit" value="Submit">
        

    </form> 
</article>

<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit/template.php'; ?>

<?php $objBdd = null; ?>
