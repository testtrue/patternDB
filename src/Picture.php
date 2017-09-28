<?php

class Picture
{

    /**
    * @var int
    */
    private $idPicture;

    /**
     * @param int $idPicture
     */
    public function setIdPicture(int $idPicture)
    {
        $this->idPicture = $idPicture;
    }

    /**
    * @var string
    */
    private $filename;

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
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename)
    {
        $this->filename = $filename;
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
