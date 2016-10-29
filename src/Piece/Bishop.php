<?php

namespace Dasc\Chess\Piece;

class Bishop extends Piece 
{
    public function getLabel()
    {
        return 'B';
    }

    public function getMoves()
    {
        return [
            'diagonal' => 8,
        ];
    }
}