<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Winkelmand
 *
 * @author webmaster
 */
class Winkelmand {
    //put your code here
    
    
    public $mand = array();

    /**
     * Vult het mandje op
     * @param array $items
     * @return void
     *
     */
    public function toevoegenAanMand($items) {
        
        //controle of items aan array is
        if (!is_array($items)) {
            return;
        }
        // We lussen over het bestaande mandje om te zien of er reeds een element met hetzelfde id bestaat in onze mand
        foreach ($this->mand as $key => $value) {
            if ($this->mand[$key]['id'] === $items['id']) {
                $this->mand[$key]['aantal'] += $items['aantal'];
                return;// stop met code uit te voeren, we verwachten maar één element en die hebben we gehad!
            }
        }
        
       // nog geen element in ons mandje, we voegen het dus toe.
       $this->mand[] = $items;

    }

    /**
     * verwijdert een element of vermindert het aantal
     * @param array $items
     * @return void
     */
    public function verwijderenUitMand($items) {

        //controle of items aan array is
        if (!is_array($items)) {
            return;
        }
        // DIY
       foreach ($this->mand as $key => $value) {
            if ($this->mand[$key]['id'] === $items['id']) {
                 $this->mand[$key]['aantal'] -= $items['aantal'];
                return;// stop met code uit te voeren, we verwachten maar één element en die hebben we gehad!
               
            } else {
                unset($this->mand[$key]);// hier verwijderen we de key uit deze array
                return;// stop met code uit te voeren,
            }
        }
        

    }

    /**
     * Mandje weergeven als object
     * @return array $this->mand
     */
    public function mandWeergeven() {
        //$value = $this->mand;
        return $this->mand;
    }

    /**
     * mand leegmaken
     * @return empty array mand
     */
    public function mandLeegmaken() {

        // DIY
        // hier gewoon de array gaan opvullen met een nieuwe ledige array
        $this->mand = array();

        return $this->mand;
    }
    
    
}

?>
