<?php
require_once 'GeneralHTML.php';

/**
 * Description of PersonneHTML
 *
 * @author Fabrice Missonnier
 */
 class PersonneHTML {
    private $general;
    
    function __construct() {
       $this->general = new GeneralHTML();
    }

    
    public function afficheLesPersonnes ($tabElements){
        $this->general->getDebutPage("Affichage des personnes");
        
        $nb = count ($tabElements);
        
        for($i=0;$i<$nb;$i++ ){
            echo($tabElements[$i]["NumP"]." ". $tabElements[$i]["NomP"]." "
                 .$tabElements[$i]["PrenomP"]." ");
            if ($tabElements[$i]["SexeP"] == "E")
                 echo ("Essence <BR/>");
            else
                 echo ("Diesel <BR/>");
        }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    
    public function afficheFormInsertionPersonne(){
        $this->general->getDebutPage("Insertion d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <form action="do.php " method="GET">
                    Marque :  
                    <input type="text" name="nomP" size="20" ><BR/><BR/>
                    Modèle : 
                    <input type="text" name="prenomP" size="20" ><BR/><BR/>
                    Carburant :  <BR/>
                    <INPUT type='radio' name='sexeP' value='E'> Essence <BR/>
                    <INPUT type='radio' name='sexeP' value='D'> Diesel <BR/>
                    <br/><br/>
                    <input type="hidden" name="action" value="inserePersonne">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    public function afficheFormSupprPersonne(){
        $this->general->getDebutPage("Suppression d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <form action="do.php " method="GET">
                    Numéro du véhicule :  
                    <input type="text" name="numP" size="20" ><BR/><BR/>
                    <br/>
                    <input type="hidden" name="action" value="SupprPersonne">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    public function afficheFormModifPersonne(){
        $this->general->getDebutPage("Modification d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <p align="center"><font size="6pt" color="red"><b> Bien compléter tous les champs, sinon les données seront perdues !</b></font></p><br><br>
            <form action="do.php " method="GET">
                     Numéro du véhicule :  
                    <input type="text" name="numP" size="20" ><BR/><BR/>
                    Marque :  
                    <input type="text" name="nomP" size="20" ><BR/><BR/>
                    Modèle : 
                    <input type="text" name="prenomP" size="20" ><BR/><BR/>
                    Carburant :  <BR/>
                    <INPUT type='radio' name='sexeP' value='E'> Essence <BR/>
                    <INPUT type='radio' name='sexeP' value='D'> Diesel <BR/>
                    <br/><br/>
                    <input type="hidden" name="action" value="modifPersonne">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    public function afficheInsertPersonneOK(){
        $this->general->getDebutPage("Insertion OK");
        ?>
        La voiture est bien insérée/supprimée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
     
    public function afficheInsertPersonneNonOK(){
        $this->general->getDebutPage("Insertion pas bien déroulée");
        ?>
        La voiture n'a pas été insérée/supprimée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
}
?>
