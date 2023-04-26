<?php
namespace df\interfaces\players;

use jeyroik\extas\interfaces\systems\IItem;

/**
 * Interface IPlayerIdentity
 *
 * @stage.name df.player.identity.init
 * @stage.description DeFlou player identity initialized
 * @stage.input IPlayerIdentity $playerIdentity
 * @stage.output void
 *
 * @package df\interfaces\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayerIdentity extends IItem
{
    const SUBJECT = 'df.player.identity';

    const FIELD__ID = 'id';
    const FIELD__SECRET = 'secret';
    const FIELD__SOURCE = 'source';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getSecret();

    /**
     * @return mixed
     */
    public function getSource();

    /**
     * @param $id
     *
     * @return IPlayerIdentity
     */
    public function setId($id);

    /**
     * @param $secret
     *
     * @return IPlayerIdentity
     */
    public function setSecret($secret);

    /**
     * @param $source
     *
     * @return IPlayerIdentity
     */
    public function setSource($source);
}
