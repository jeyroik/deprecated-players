<?php
namespace df\components\players;

use df\interfaces\players\IPlayer;
use df\interfaces\players\IPlayerGroup;
use df\interfaces\players\IPlayerIdentity;
use df\interfaces\players\IPlayerSetting;
use jeyroik\extas\components\systems\Item;

/**
 * Class Player
 *
 * @package df\components\players
 * @author Funcraft <me@funcraft.ru>
 */
class Player extends Item implements IPlayer
{
    /**
     * @return array
     */
    public function getIdentities()
    {
        return $this->config[static::FIELD__IDENTITIES] ?? [];
    }

    /**
     * @return array
     */
    public function getAliases()
    {
        return $this->config[static::FIELD__ALIASES] ?? [];
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->config[static::FIELD__SETTINGS] ?? [];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->config[static::FIELD__NAME] ?? '';
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->config[static::FIELD__DESCRIPTION] ?? '';
    }

    /**
     * @param $id
     *
     * @return IPlayerIdentity|null
     */
    public function getIdentity($id)
    {
        $identities = $this->getIdentities();
        $byId = array_column($identities, null, IPlayerIdentity::FIELD__ID);
        $identity = $byId[$id] ?? false;

        return $identity ? new PlayerIdentity($identity) : null;
    }

    /**
     * @param $name
     *
     * @return IPlayerSetting|null
     */
    public function getSetting($name)
    {
        $settings = $this->getSettings();
        $byName = array_column($settings, null, IPlayerSetting::FIELD__NAME);
        $setting = $byName[$name] ?? false;

        return $setting ? new PlayerSetting($setting) : null;
    }

    /**
     * @param $identities
     *
     * @return IPlayer
     */
    public function setIdentities($identities)
    {
        $this->config[static::FIELD__IDENTITIES] = $identities;

        return $this;
    }

    /**
     * @param $settings
     *
     * @return IPlayer
     */
    public function setSettings($settings)
    {
        $this->config[static::FIELD__SETTINGS] = $settings;

        return $this;
    }

    /**
     * @param $aliases
     *
     * @return IPlayer
     */
    public function setAliases($aliases)
    {
        $this->config[static::FIELD__ALIASES] = $aliases;

        return $this;
    }

    /**
     * @param $name
     *
     * @return IPlayer
     */
    public function addAlias($name)
    {
        $this->config[static::FIELD__ALIASES][] = $name;

        return $this;
    }

    /**
     * @param $name
     *
     * @return IPlayer
     */
    public function setName($name)
    {
        $this->config[static::FIELD__NAME] = $name;

        return $this;
    }

    /**
     * @param $description
     *
     * @return IPlayer
     */
    public function setDescription($description)
    {
        $this->config[static::FIELD__DESCRIPTION] = $description;

        return $this;
    }

    /**
     * @param $id
     * @param $identity IPlayerIdentity|array
     *
     * @return IPlayer
     */
    public function setIdentity($id, $identity)
    {
        $identities = $this->getIdentities();
        $byId = array_column($identities, null, IPlayerIdentity::FIELD__ID);
        $byId[$id] = $identity instanceof IPlayerIdentity
            ? $identity->__toArray()
            : $identity;

        $this->setIdentities(array_values($byId));

        return $this;
    }

    /**
     * @param $name
     * @param $setting IPlayerSetting|array
     *
     * @return IPlayer
     */
    public function setSetting($name, $setting)
    {
        $settings = $this->getSettings();
        $byName = array_column($settings, null, IPlayerSetting::FIELD__NAME);
        $byName[$name] = $setting instanceof IPlayerSetting
            ? $setting->__toArray()
            : $setting;

        $this->setSettings(array_values($byName));

        return $this;
    }

    /**
     * @param $identity IPlayerIdentity|array
     *
     * @return IPlayer
     */
    public function addIdentity($identity)
    {
        $this->config[static::FIELD__IDENTITIES][] = $identity instanceof IPlayerIdentity
            ? $identity->__toArray()
            : $identity;

        return $this;
    }

    /**
     * @param $setting IPlayerSetting|array
     *
     * @return IPlayer
     */
    public function addSetting($setting)
    {
        $this->config[static::FIELD__SETTINGS][] = $setting instanceof IPlayerSetting
            ? $setting->__toArray()
            : $setting;

        return $this;
    }

    /**
     * @return IPlayerGroup
     */
    public function __toGroup(): IPlayerGroup
    {
        return new PlayerGroup($this->__toArray());
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
