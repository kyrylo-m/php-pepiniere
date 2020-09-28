<?php

abstract class Manager {

	protected function connexionBD()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet_pepiniere;charset=utf8', 'root', '');
			return $bdd;
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}

}