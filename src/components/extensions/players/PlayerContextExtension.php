<?php
namespace df\components\extensions\players;

use df\components\players\Player;
use df\interfaces\extensions\players\IPlayerContextExtension;
use df\interfaces\players\IPlayer;
use df\interfaces\players\IPlayerRepository;
use jeyroik\extas\components\systems\Extension;
use jeyroik\extas\components\systems\SystemContainer;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class PlayerContextExtension
 *
 * @package df\components\extensions\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerContextExtension extends Extension implements IPlayerContextExtension
{
    public $subject = IContext::SUBJECT;

    /**
     * @param $playerData
     *
     * @return IPlayer
     */
    public function createPlayer($playerData): IPlayer
    {
        $player = new Player($playerData);

        /**
         * @var $playerRepo IPlayerRepository
         */
        $playerRepo = SystemContainer::getItem(IPlayerRepository::class);
        $playerRepo->create($player);

        return $player;
    }
}
