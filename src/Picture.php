<?php

class Picture
{

    /**
    * @var int
    */
    private $idPicture;

    /**
    * @var string
    */
    private $filepath;

    /**
    * @var string
    */
    private $caption;

    /**
     * @return int
     */
    public function getIdPicture(): int
    {
        return $this->idPicture;
    }

    /**
     * @return string
     */
    public function getFilepath(): string
    {
        return $this->filepath;
    }

    /**
     * @param string $filepath
     */
    public function setFilepath(string $filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption)
    {
        $this->caption = $caption;
    }

}
