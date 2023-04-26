<?php
namespace df\components\extensions\players;

use df\components\players\PlayerGroup;
use df\components\players\PlayerIdentity;
use df\interfaces\extensions\players\IPlayerContextExtensionGroup;
use df\interfaces\players\IPlayerGroup;
use df\interfaces\players\IPlayerIdentity;
use df\interfaces\players\IPlayerRepository;
use jeyroik\extas\components\systems\Extension;
use jeyroik\extas\components\systems\SystemContainer;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class PlayerContextExtensionGroup
 *
 * @package df\components\extensions\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerContextExtensionGroup extends Extension implements IPlayerContextExtensionGroup
{
    public $subject = IContext::SUBJECT;

    /**
     * @param array $groupData
     *
     * @return IPlayerGroup
     */
    public function createGroup($groupData)
    {
        $name = $groupData['name'] ?? '';
        $source = $groupData['source'] ?? '';
        $admins = $groupData['admins'] ?? [];

        $groupIdentity = new PlayerIdentity([
            IPlayerIdentity::FIELD__ID => $name,
            IPlayerIdentity::FIELD__SECRET => IPlayerGroup::IDENTITY__GROUP_SECRET,
            IPlayerIdentity::FIELD__SOURCE => $source
        ]);

        $groupPlayer = new PlayerGroup([
            IPlayerGroup::FIELD__NAME => $name,
            IPlayerGroup::FIELD__DESCRIPTION => 'Group ' . $name,
            IPlayerGroup::FIELD__SETTINGS => [
                IPlayerGroup::SETTING__ADMINS => $admins
            ],
            IPlayerGroup::FIELD__IDENTITIES => [
                $groupIdentity->__toArray()
            ],
            IPlayerGroup::FIELD__ALIASES => [
                $name
            ]
        ]);

        /**
         * @var $groupRepo IPlayerRepository
         */
        $groupRepo = SystemContainer::getItem(IPlayerRepository::class);
        $groupRepo->create($groupPlayer);

        return $groupPlayer;
    }
}
