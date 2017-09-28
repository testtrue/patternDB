<?php
/**
 * Created by PhpStorm.
 * User: NIKITA
 * Date: 28.09.2017
 * Time: 11:45
 */

class PatternType
{
    /**
     * @var int
     */
    private $idPatternType;

    /**
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getIdPatternType(): int
    {
        return $this->idPatternType;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}
