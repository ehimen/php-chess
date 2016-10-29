<?php

namespace Dasc\Chess;

use Dasc\Chess\Board\Board;

class Game
{
    /**
     * @var Board
     */
    private $board;
    
    private $turn;
    
    public function __construct()
    {
        $this->board = new Board();
        $this->turn  = 'white';
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function endTurn()
    {
        if ('white' === $this->turn) {
            $this->turn = 'black';
        } else {
            $this->turn = 'white';
        }
    }

    public function getTurn()
    {
        return $this->turn;
    }
}