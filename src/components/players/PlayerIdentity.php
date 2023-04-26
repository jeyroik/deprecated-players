<?php
namespace df\components\players;

use df\interfaces\players\IPlayerIdentity;
use jeyroik\extas\components\systems\Item;

/**
 * Class PlayerIdentity
 *
 * @package df\components\players
 * @author Funcraft <me@funcraft.ru>
 */
class PlayerIdentity extends Item implements IPlayerIdentity
{
    /**
     * @return string
     */
    public function getId()
    {
        return $this->config[static::FIELD__ID] ?? '';
    }

    /**
     * @return string
     */
    public function getSecret()
    {
        return $this->config[static::FIELD__SECRET] ?? '';
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->config[static::FIELD__SOURCE] ?? '';
    }

    /**
     * @param $id
     *
     * @return IPlayerIdentity
     */
    public function setId($id)
    {
        $this->config[static::FIELD__ID] = $id;

        return $this;
    }

    /**
     * @param $secret
     *
     * @return IPlayerIdentity
     */
    public function setSecret($secret)
    {
        $this->config[static::FIELD__SECRET] = $secret;

        return $this;
    }

    /**
     * @param $source
     *
     * @return IPlayerIdentity
     */
    public function setSource($source)
    {
        $this->config[static::FIELD__SOURCE] = $source;

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
