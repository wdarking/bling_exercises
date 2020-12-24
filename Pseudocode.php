<?php

class Element {
    protected $name;
    protected $data;

    public function __construct($name, $data) {
        $this->name = $name;
        $this->data = $data;
    }

    public function getElements()
    {
        return [$this];
    }
}

class Component {
    protected $elements;

    public function __construct(array $elements) {
        $this->elements = $elements;
    }

    public function getElements() {
        return $this->elements;
    }
}

class ComponentIterator {
    protected $components;

    public function __construct(array $components) {
        $this->components = $components;
    }

    public function getElements() {
        $list = [];
        foreach($this->components as $component) {
            $list[] = $component->getElements();
        }
        return $list;
    }
}
