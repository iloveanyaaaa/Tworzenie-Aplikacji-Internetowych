<?php
class Samochod {
    public $marka;
    public $model;
    public function __construct($marka, $model) {
        $this->marka = $marka;
        $this->model = $model;
    }
    public function przedstawSie() {
        return "Samochód: $this->marka $this->model";
    }
}
$auto = new Samochod("Peugot", "106");
echo $auto->przedstawSie();
?>