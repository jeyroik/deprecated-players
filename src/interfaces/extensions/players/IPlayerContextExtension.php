<?php
namespace df\interfaces\extensions\players;

use df\interfaces\players\IPlayer;

/**
 * Interface IPlayerContextExtension
 *
 * @package df\interfaces\extensions\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayerContextExtension
{
    /**
     * @param $playerData
     *
     * @return IPlayer
     */
    public function createPlayer($playerData): IPlayer;
}