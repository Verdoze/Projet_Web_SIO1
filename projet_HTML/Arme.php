<?php

class Arme
{ 
    private string $id;
    private string $name;
    private string $degats;
    private string $valeur;
    private string $poids;
    private string $typeArme;
    private string $inGameId;
    private string $imageSrc;
    private string $description;

    /**
     * @param string $name
     * @param string $username
     
     */
    public function __construct( string $id, string $name, string $degats, string $valeur, string $poids, string $typeArme, 
		string $inGameId, string $imageSrc, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->degats = $degats;
        $this->valeur = $valeur;
        $this->poids = $poids;
        $this->typeArme = $typeArme;        
        $this->inGameId = $inGameId;
        $this->imageSrc = $imageSrc;
        $this->description = $description;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this-> name;
    }
	
    public function getDegats(): ?string
    {
        return $this->degats;
    }
	
    public function getValeur(): string
    {
        return $this->valeur;
    }

    public function getPoids(): string
    {
        return $this->poids;
    }

    public function getTypeArme(): string
    {
        return $this-> typeArme;
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

}