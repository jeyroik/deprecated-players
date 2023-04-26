<?php
namespace df\interfaces\players;

use jeyroik\extas\interfaces\systems\IItem;

/**
 * Interface IPlayer
 *
 * @stage.name df.player.init
 * @stage.description DeFlou player initialized
 * @stage.input IPlayer $player
 * @stage.output void
 *
 * @package df\interfaces\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayer extends IItem
{
    const SUBJECT = 'df.player';

    const FIELD__IDENTITIES = 'identities';
    const FIELD__SETTINGS = 'settings';
    const FIELD__NAME = 'name';
    const FIELD__DESCRIPTION = 'description';
    const FIELD__ALIASES = 'aliases';

    /**
     * @return array
     */
    public function getIdentities();

    /**
     * @return array
     */
    public function getSettings();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return array
     */
    public function getAliases();

    /**
     * @param $id
     *
     * @return IPlayerIdentity|null
     */
    public function getIdentity($id);

    /**
     * @param $name
     *
     * @return IPlayerSetting|null
     */
    public function getSetting($name);

    /**
     * @param $identities
     *
     * @return IPlayer
     */
    public function setIdentities($identities);

    /**
     * @param $settings
     *
     * @return IPlayer
     */
    public function setSettings($settings);

    /**
     * @param $name
     *
     * @return IPlayer
     */
    public function setName($name);

    /**
     * @param $description
     *
     * @return IPlayer
     */
    public function setDescription($description);

    /**
     * @param $aliases
     *
     * @return IPlayer
     */
    public function setAliases($aliases);

    /**
     * @param $name
     *
     * @return IPlayer
     */
    public function addAlias($name);

    /**
     * @param $identity
     *
     * @return IPlayer
     */
    public function addIdentity($identity);

    /**
     * @param $id
     * @param $identity
     *
     * @return IPlayer
     */
    public function setIdentity($id, $identity);

    /**
     * @param $setting
     *
     * @return IPlayer
     */
    public function addSetting($setting);

    /**
     * @param $name
     * @param $setting
     *
     * @return IPlayer
     */
    public function setSetting($name, $setting);

    /**
     * @return IPlayerGroup
     */
    public function __toGroup(): IPlayerGroup;
}
