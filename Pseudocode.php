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

atores->filmes: n,n
filmes->atores n,n

SELECT * FROM `atores` JOIN ator_filme ON atores.id = ator_filme.ator_id JOIN filmes ON ator_filme.filme_id = filmes.id WHERE filmes.titulo = 'XYZ'

SELECT * FROM `filmes` JOIN ator_filme ON filmes.id = ator_filme.filme_id JOIN atores ON ator_filme.ator_id = atores.id WHERE atores.nome = 'FULANO' AND ator_filme.funcao = 'participante'

SELECT filmes.titulo, filmes.ano, COUNT(filmes.id) as total_participantes FROM filmes JOIN ator_filme ON filmes.id = ator_filme.filme_id WHERE filmes.ano = '2015' GROUP BY filmes.id
ORDER BY `filmes`.`titulo` ASC, `total_participantes` DESC

SELECT * FROM `atores` JOIN ator_filme ON ator_filme.ator_id = atores.id WHERE ator_filme.filme_id IN (SELECT filmes.id FROM `filmes` WHERE filmes.id IN (SELECT ator_filme.filme_id FROM ator_filme JOIN atores ON atores.id = ator_filme.ator_id WHERE atores.nome = 'SPIELBERG' and ator_filme.funcao = 'diretor')) AND ator_filme.funcao = 'participante'
