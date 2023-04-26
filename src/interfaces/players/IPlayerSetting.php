<?php
namespace df\interfaces\players;

use jeyroik\extas\interfaces\systems\IItem;

/**
 * Interface IPlayerSetting
 *
 * @stage.name df.player.setting.init
 * @stage.description DeFlou player setting initialized
 * @stage.input IPlayerSetting $playerSetting
 * @stage.output void
 *
 * @package df\interfaces\players
 * @author Funcraft <me@funcraft.ru>
 */
interface IPlayerSetting extends IItem
{
    const SUBJECT = 'df.player.setting';

    const FIELD__ID = 'id';
    const FIELD__NAME = 'name';

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $name
     *
     * @return IPlayerSetting
     */
    public function setName($name);

    /**
     * @param $id
     *
     * @return IPlayerSetting
     */
    public function setId($id);
}
