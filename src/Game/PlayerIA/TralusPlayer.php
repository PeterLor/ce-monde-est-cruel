<?php

namespace Hackathon\PlayerIA;

use Hackathon\Game\Result;

/**
 * 
 * Class TralusPlayers
 * @package Hackathon\PlayerIA
 * @author Peter LOR
 * Check les spammers
 * Check si au bout de quelque round je perd, et jouer le coup gagnant en fct de la strat de base
 * la strat de base joue le coup après le dernier coup adverse
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

    public function playlastcounter()
    {
        $lastopp = $this->result->getLastChoiceFor($this->opponentSide);
        $lastme = $this->result->getLastChoiceFor($this->mySide);
        $round = $this->result->getNbRound();
        $sc = $this->result->getLastScoreFor($this->mySide);
        if ($round > 15 && $sc == 0)
        {
            if ($lastme == 'rock')
                return parent::paperChoice();
            elseif ($lastme == 'paper')
                return parent::scissorsChoice();
            else
                return parent::rockChoice();
        }
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

    public function getfcked()
    {
        $a = $this->result->getLastScoreFor($this->mySide);
    }

    public function getChoice()
    {
        return $this->playlast();
    }
}