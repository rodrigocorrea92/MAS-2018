<?php

class Controladora{
    private $socioActual;
    private $colLineasPendientes = array();
    private $catSocio;

    public function getSocioActual()
    {
        return $this->socioActual;
    }
    public function setSocioActual($socioActual)
    {
        $this->socioActual = $socioActual;
    }
    public function getColLineasPendientes()
    {
        return $this->colLineasPendientes;
    }
    public function setColLineasPendientes($colLineasPendientes)
    {
        $this->colLineasPendientes = $colLineasPendientes;
    }

    public function getCatSocio()
    {
        return $this->catSocio;
    }
    public function setCatSocio($catSocio)
    {
        $this->catSocio = $catSocio;
    }

    public function IngresarSocio($nroSocio)
    {
        $this->socioActual = $this->catSocio->BuscarSocio($nroSocio);

        $nombre = $this->socioActual->getNombre();
        $apellido = $this->socioActual->getApellido();

        $this->colLineasPendientes = $this->socioActual->getLineasPendientes();
        foreach($this->colLineasPendientes as $lp)
        {
            $ejem= $lp->getEjemplar();
            $nroEjemplar = $ejem->getNumero();
            $libro = $ejem->getLibro();
            $titulo = $libro->getTitulo();
        }

    }

}
