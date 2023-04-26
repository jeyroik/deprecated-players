<?php
namespace df\components\players;

use df\interfaces\players\IPlayer;
use df\interfaces\players\IPlayerRepository;
use jeyroik\extas\components\systems\repositories\RepositoryMongo;

/**
 * Class PlayerRepository
 *
 * @package df\components\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerRepository extends RepositoryMongo implements IPlayerRepository
{
    protected $collectionName = 'df__players';
    protected $itemClass = Player::class;
    protected $collectionUID = IPlayer::FIELD__NAME;
}
