<?php
class BDD{
	// Attributs
	private $idUser = "root";
	private $password = "root";
	private $bdd;
	private $req;

	public function __construct(){
		try
		{	
			$this->bdd = new PDO('mysql:host=localhost;dbname=stalkus;charset=utf8', $this->idUser,$this->password);
		}
		catch(Exception $e)
		{
	        echo "Erreur lors de la connection à la bdd : "; echo $e;
		}
	}

	public function getBdd(){return $this->bdd;}
	public function getReq(){return $this->req;}

	public function createUserReq(string $email,string $mdp,string $nom){
		try
		{
            $this->req = $this->bdd->prepare("INSERT INTO `utilisateur` (`email`, `mdp`, `nom`) VALUES ('".$email."', '".$mdp."', '".$nom."');");

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        }
	}

	public function delUserReq(int $_id){
		try
		{
            $this->req = $this->bdd->prepare("DELETE FROM `utilisateur` WHERE id = ".$_id);

        }catch(Exception $e){
            echo "Erreur lors de la preparation de la suppression : ".$e;
        }
	}

	public function getUserInfo()
	{
		try
		{
			$userArray = [];
            $reponse = $this->bdd->query('SELECT * FROM utilisateur');
            while ($donnees = $reponse->fetch())
			{
				$userArray[] = [$donnees['id'],$donnees['email'],$donnees['nom']];
			}

			$reponse->closeCursor();
			return $userArray;

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        }
    }

	public function getUserId($id)
	{
		try
		{
			$userArray = [];
            $reponse = $this->bdd->query('SELECT * FROM utilisateur WHERE id='.$id);
            while ($donnees = $reponse->fetch())
			{
				$userArray[] = [$donnees['id'],$donnees['email'],$donnees['nom']];
			}

			$reponse->closeCursor();
			return $userArray;

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        }
    }


	public function getAllMessage()
	{
		try
		{
			$messageArray = [];
            $reponse = $this->bdd->query('SELECT * FROM message');
            while ($donnees = $reponse->fetch())
			{
				$messageArray[] = [$donnees['id'],$donnees['id_expediteur'],$donnees['id_receveur'],$donnees['contenu']];
			}

			$reponse->closeCursor();
			return $messageArray;

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        } 
    }

    	public function getMessageExpediteur($id_expediteur)
	{
		try
		{
			$messageArray = [];
            $reponse = $this->bdd->query('SELECT * FROM message WHERE id_expediteur='.$id_expediteur );
            while ($donnees = $reponse->fetch())
			{
				$messageArray[] = [$donnees['id'],$donnees['id_expediteur'],$donnees['id_receveur'],$donnees['contenu']];
			}

			$reponse->closeCursor();
			return $messageArray;

        }catch(Exception $e){
            echo "Erreur lors de la preparation : ".$e;
        } 
    }



	public function execute(){
		try
		{
			$this->req->execute();
		}catch(Exception $e){
			echo "Erreur lors de l'execution : ".$e;
		}
	}
}


