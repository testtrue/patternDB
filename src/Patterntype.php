<?php
/**
 * Created by PhpStorm.
 * User: NIKITA
 * Date: 28.09.2017
 * Time: 11:45
 */

class Patterntype
{
    /**
     * @var int
     */
    private $idPatternType;

    /**
     * @param int $idPatternType
     */
    public function setIdPatternType(int $idPatternType)
    {
        $this->idPatternType = $idPatternType;
    }

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
