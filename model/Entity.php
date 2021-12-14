<?php
class Entity {
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    /** Hydratation **/
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}