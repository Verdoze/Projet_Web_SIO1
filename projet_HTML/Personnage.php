<?php

class Personnage
{ 
    private string $id;
    private string $name;
    private ?string $surname;
    private string $race;
    private string $classe;
    private string $inGameId;
    private string $imageSrc;
    private ?string $description;

    /**
     * @param string $name
     * @param string $username
     
     */
    public function __construct( string $id, string $name, ?string $surname, string $race, string $classe, 
		string $inGameId, string $imageSrc, ?string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname ?? "";
        $this->race = $race;
        $this->classe = $classe;
        $this->inGameId = $inGameId;
        $this->imageSrc = $imageSrc;
        $this->description = $description ?? "";
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this-> name;
    }
	
    public function getSurname(): ?string
    {
        return $this->surname;
    }
	
    public function getRace(): string
    {
        return $this->race;
    }

    public function getClasse(): string
    {
        return $this-> classe;
    }

    public function getInGameId(): string
    {
        return $this->inGameId;
    }

    public function getImageSrc(): ?string
    {
        return $this->imageSrc;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

}?>