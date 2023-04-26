<?php
namespace df\components\players;

use df\interfaces\players\IPlayer;
use df\interfaces\players\IPlayerGroup;
use df\interfaces\players\IPlayerSetting;

/**
 * Class PlayerGroup
 *
 * @stage.name df.player.group.init
 * @stage.description DeFlou player group initialized
 * @stage.input IPlayerGroup $group
 * @stage.output void
 *
 * @package df\components\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerGroup extends Player implements IPlayerGroup
{
    /**
     * @return string[]
     */
    public function getAdmins()
    {
        $adminsSetting = $this->getSetting(static::SETTING__ADMINS);

        return $adminsSetting ? $adminsSetting->getId() : [];
    }

    /**
     * @param IPlayer|string $player
     *
     * @return bool
     */
    public function isAdmin($player): bool
    {
        $adminName = $player instanceof IPlayer ? $player->getName() : $player;
        $admins = $this->getAdmins();

        return in_array($adminName, $admins);
    }

    /**
     * @param $admins
     *
     * @return IPlayerGroup
     */
    public function setAdmins($admins)
    {
        $this->setSetting(
            static::SETTING__ADMINS,
            [
                IPlayerSetting::FIELD__NAME => static::SETTING__ADMINS,
                IPlayerSetting::FIELD__ID => $admins
            ]
        );

        return $this;
    }

    /**
     * @param IPlayer|string $admin
     *
     * @return bool
     */
    public function removeAdmin($admin): bool
    {
        $adminName = $admin instanceof IPlayer ? $admin->getName() : $admin;
        $admins = $this->getAdmins();
        $byName = array_flip($admins);

        if (isset($byName[$adminName])) {
            unset($byName[$adminName]);
        } else {
            return false;
        }

        $this->setAdmins(array_flip($byName));

        return true;
    }

    /**
     * @param $groupName
     *
     * @return IPlayerGroup
     */
    public function extendGroup($groupName)
    {
        $this->addAlias($groupName);

        return $this;
    }

    /**
     * @param IPlayer|string $admin
     *
     * @return IPlayerGroup
     */
    public function addAdmin($admin)
    {
        $admins = $this->getAdmins();
        $admins[] = $admin instanceof IPlayer ? $admin->getName() : $admin;
        $this->setAdmins($admins);

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return parent::getSubjectForExtension() . '.group';
    }
}
