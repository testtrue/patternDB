<?php

class Pattern
{
    /**
     * @var int
     */
    private $idPattern;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Patterntype
     */
    private $patterntype;

    /**
     * @var string
     */
    private $shortDescription;

    /**
     * @var string
     */
    private $longDescription;

    /**
     * @var Picture
     */
    private $picture;

    /**
     * @var string
     */
    private $code;

    /**
     * @return int
     */
    public function getIdPattern(): int
    {
        return $this->idPattern;
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

    /**
     * @return Patterntype
     */
    public function getPatterntype(): Patterntype
    {
        return $this->patterntype;
    }

    /**
     * @param Patterntype $patterntype
     */
    public function setPatterntype(Patterntype $patterntype)
    {
        $this->patterntype = $patterntype;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription(string $shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getLongDescription(): string
    {
        return $this->longDescription;
    }

    /**
     * @param string $longDescription
     */
    public function setLongDescription(string $longDescription)
    {
        $this->longDescription = $longDescription;
    }

    /**
     * @return Picture
     */
    public function getPicture(): Picture
    {
        return $this->picture;
    }

    /**
     * @param Picture $picture
     */
    public function setPicture(Picture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param int $idPattern
     */
    public function setIdPattern(int $idPattern)
    {
        $this->idPattern = $idPattern;
    }
}
