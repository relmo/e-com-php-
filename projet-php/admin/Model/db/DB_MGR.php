<?php
	class DbMgr
	{
		private $server, $user, $mpass, $base;
		public function DbMgr ()
		{
			$this->server="localhost";
			$this->user="root";
			$this->mpass="";
			$this->base="vente_en_ligne";
		}
		
		public function connecte ()
		{
			return mysqli_connect($this->server,$this->user,$this->mpass,$this->base);
		} 
		
		public function deconnecte ()
		{
			return mysqli_close($link);
		} 
		
		public function execute($req,$link="")
		{
			if($link=="")
				$link=$this->connecte();
			return mysqli_query($link,$req);
		}
		
		public function parcoure($exe)
		{
			$tab= mysqli_fetch_array($exe);
			return $tab;
		}
		//formater un resultset en table
		public function formatResultSetToTable($exe)
		{
			$mat=array();
			while($row=mysqli_fetch_assoc($exe))
			{
				//ajouter un element a la fin du tableau
				array_push($mat,$row);
			}
			return $mat;
		}
		
		public function nb_ligne($exe)
		{
			$nb = mysqli_num_rows($exe);
			return $nb;
		}
		
	}
?>