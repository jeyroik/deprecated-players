<?php
namespace df\components\players;

use df\interfaces\players\IPlayerSetting;
use jeyroik\extas\components\systems\Item;

/**
 * Class PlayerSetting
 *
 * @package df\components\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerSetting extends Item implements IPlayerSetting
{
    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->config[static::FIELD__ID] ?? '';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->config[static::FIELD__NAME] ?? '';
    }

    /**
     * @param $id
     *
     * @return $this|IPlayerSetting
     */
    public function setId($id)
    {
        $this->config[static::FIELD__ID] = $id;

        return $this;
    }

    /**
     * @param $name
     *
     * @return $this|IPlayerSetting
     */
    public function setName($name)
    {
        $this->config[static::FIELD__NAME] = $name;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
