<?php
namespace df\interfaces\extensions\players;

use df\interfaces\players\IPlayerGroup;

/**
 * Interface IPlayerContextExtensionGroup
 *
 * @package df\interfaces\extensions\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayerContextExtensionGroup
{
    /**
     * @param array $groupData
     *
     * @return IPlayerGroup
     */
    public function createGroup($groupData);
}
