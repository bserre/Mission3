<?php


/**
 * Description of PersonnePDO
 *
 * @author Fabrice Missonnier
 */

 class PersonnePDO {
    
    public function getLesPersonnes(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT * FROM Voiture");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["NumP"] = $enregistrement->NumV;
            $tabElem[$i]["NomP"] = $enregistrement->Marque;
            $tabElem[$i]["PrenomP"] = $enregistrement->Modele;
            $tabElem[$i]["SexeP"] = $enregistrement->Carburant;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
   
    public function setUnePersonne($nomP, $prenomP, $sexeP){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "INSERT INTO Voiture (Marque, Modele, Carburant) VALUES
            ('".$nomP."', '".$prenomP."', '".$sexeP."');";
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
           throw new ModeleExceptions (1);
        }
    }
    
    public function setSupprPersonne($numP){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "DELETE FROM Voiture WHERE numV = ".$numP;
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
           throw new ModeleExceptions (1);
        }
    }
    
    public function setModifPersonne($num, $nomP, $prenomP, $sexeP){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "UPDATE Voiture SET Marque = '".$nomP."', Modele = '".$prenomP."', Carburant = '".$sexeP."' WHERE NumV = ".$num;
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
           throw new ModeleExceptions (1);
        }
    }
    
}
?>
