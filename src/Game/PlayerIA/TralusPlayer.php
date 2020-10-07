<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * Class TralusPlayers
 * @package Hackathon\PlayerIA
 * @author Peter LOR
 */
class TralusPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
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
};
