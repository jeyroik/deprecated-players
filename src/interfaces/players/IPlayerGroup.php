<?php
namespace df\interfaces\players;

/**
 * Interface IPlayerGroup
 *
 * @package df\interfaces\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayerGroup extends IPlayer
{
    const SETTING__ADMINS = 'admins';
    const IDENTITY__GROUP_SECRET = 'group';

    /**
     * @return string[]
     */
    public function getAdmins();

    /**
     * @param $player IPlayer|string
     *
     * @return bool
     */
    public function isAdmin($player): bool;

    /**
     * @param $admin IPlayer|string
     *
     * @return IPlayerGroup
     */
    public function addAdmin($admin);

    /**
     * @param $admin IPlayer|string
     *
     * @return bool
     */
    public function removeAdmin($admin): bool;

    /**
     * @param $admins
     *
     * @return IPlayerGroup
     */
    public function setAdmins($admins);

    /**
     * @param $groupName
     *
     * @return IPlayerGroup
     */
    public function extendGroup($groupName);
}
