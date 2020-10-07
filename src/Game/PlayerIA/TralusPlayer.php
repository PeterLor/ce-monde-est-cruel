<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * 
 * Class TralusPlayers
 * @package Hackathon\PlayerIA
 * @author Peter LOR
 */
class TralusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function playlast()
    {
        $lastopp = $this->result->getLastChoiceFor($this->opponentSide);

        if ($lastopp == 'rock'){
            return parent::paperChoice();
        }
        elseif ($lastopp == 'paper'){
            return parent::scissorsChoice();
        }
        else
            return parent::rockChoice();
    }

    public function spammer($array, $l)
    {
        $i = 1;
        while ($i < $l) {
            if ($array[$i] != $array[$i - 1]) {
                return false;
            }
            $i++;
        }
        return true;
    }

    public function getChoice()
    {
        $array = $this->result->getChoicesFor($this->opponentSide);
        $l = count($array);
        $spam = $this->spammer($array, $l);
        if ($l == 0 || $l == 1 || $spam == true)
            return $this->playlast();
        return parent::rockChoice();
    }
}