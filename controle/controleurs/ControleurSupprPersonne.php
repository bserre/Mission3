<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurInserePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurSupprPersonne implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        // insereAliment?descFR=Cantal&descAN=Cantal&numGenre=06.6
        try {
            $ok = $modele->getPersonne()->setSupprPersonne($tabParametres["numP"]);
            $vue->getPersonne()->afficheInsertPersonneOK();
        }
        catch(ModeleExceptions $ex){
            $vue->getAliment()->afficheInsertPersonneNonOK();
        }
    }
}

?>
