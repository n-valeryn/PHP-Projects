<?php

class Videojuego {

    protected int $id;
    protected string $titulo;
    protected string $genero;
    protected float $precio;
    protected float $precioOg;
    protected float $puntuacion;
    protected string $imagen;
    protected int $stock;

    public function __construct($id, $titulo, $genero, $precio, $puntuacion, $imagen, $stock) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->precio = $precio;
        $this->precioOg = $this->precio;
        $this->puntuacion = $puntuacion;
        $this->imagen = $imagen;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;
        return $this;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        if( $precio>0 ):
            $this->precio = $precio;
            return $this;
        endif;
    }

    public function getPrecioOg(): float
    {
        return $this->precioOg;
    }

    public function setPrecioOg(float $precioOg): self
    {
        $this->precioOg = $precioOg;
        return $this;
    }

    public function getPuntuacion(): float
    {
        return $this->puntuacion;
    }

    public function setPuntuacion(float $puntuacion): self
    {
        if (0<$puntuacion && $puntuacion<=10):
            $this->puntuacion = $puntuacion;
            return $this;
        endif;
    }

    public function getImagen(): string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;
        return $this;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    public function pintarTarjeta($tieneDscto = false) {

        ?>
        <div class="tarjeta">
            <img src='<?= $this->getImagen()?>' alt='<?= $this->getTitulo()?>'>

            <div class="info">
                <p class="genre"><?= $this->getGenero(); ?></p>
                <h2 class="titulo"><?= $this->getTitulo(); ?></h2>

            </div>
            

            <div class="details">
                <div class='precios'>
                
                    <?php if($tieneDscto):?>
                        <p class='precioOg'><?= $this->getPrecioOg(); ?>€</p>
                    <?php endif; ?>

                    <p><?= $this->getPrecio(); ?>€</p>

                </div>

                <p><?= $this->getPuntuacion(); ?>☆</p>
            </div>

            <?php if (!$this->tieneStock()): ?>
                <p class='sinStock'>Stock: Agotado</p>
            <?php else: ?>
                <p class='stock'>Stock: <?= $this->getStock(); ?></p>
            <?php endif; ?>
        </div>
        <?php
    }

    public function tieneStock(){
        return ($this->getStock())>0;
    }

    public function aplicarDescuento($porcentaje){
        $dscto = ($this->getPrecio()*$porcentaje/100);
        return round($this->getPrecio() - $dscto, 2);
    }

    public function filter($criterio){

        if ($criterio==="recomendado"):
            return ($this->getPuntuacion())>=8;
        elseif ($criterio==="oferta"):
            return ($this->getPrecio())<=20;
        elseif ($criterio==="disponible"):
            return ($this->getStock())>0;
        else:
            return "Criterio no válido";
        endif;

    }

}


?>