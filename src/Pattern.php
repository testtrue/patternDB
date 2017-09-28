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
     * @var PatternType
     */
    private $patternType;

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
    private $codeExample;

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
     * @return PatternType
     */
    public function getPatternType(): PatternType
    {
        return $this->patternType;
    }

    /**
     * @param PatternType $patternType
     */
    public function setPatternType(PatternType $patternType)
    {
        $this->patternType = $patternType;
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
    public function getCodeExample(): string
    {
        return $this->codeExample;
    }

    /**
     * @param string $codeExample
     */
    public function setCodeExample(string $codeExample)
    {
        $this->codeExample = $codeExample;
    }
}
