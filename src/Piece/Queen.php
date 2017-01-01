<?php

namespace Dasc\Chess\Piece;

class Queen extends Piece
{
    public function getLabel()
    {
        return 'Q';
    }

    public function getMoves()
    {
        return [
            'adjacent' => 8,
            'vertical' => 8,
            'diagonal' => 8,
        ];
    }
}