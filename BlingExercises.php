<?php


class BlingExercises
{
    /**
     * Run exercises
     */
    public function __construct()
    {
        var_dump('exercise1RotateArray');
        var_dump($this->exercise1RotateArray([1, 2, 3, 4, 5, 6], 2));
        var_dump('exercise2ReorderAndSort');
        var_dump($this->exercise2ReorderAndSort([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]));
        var_dump('exercise3DiffInDays');
        var_dump($this->exercise3DiffInDays('01/01/2020', '01/01/2021'));
        var_dump('exercise4FindTriangles');
        var_dump($this->exercise4FindTriangles([1, 2, 3, 4, 5, 6]));
        var_dump('exercise5FindSubstring');
        var_dump($this->exercise5FindSubstring('qwerty', 'sadf89fhp3qa-sauqlkkeoiqwertysa9ow'));

        // not implemented
        // var_dump($this->exercise6OverlapRectangles());
        // var_dump($this->exercise7FindPaths());
    }

    /**
     * Escrever um algoritmo que rotacione um array em k posições. Exemplo: o array [1,2,3,4,5,6]
     * se for girado duas posições para a esquerda se torna [3,4,5,6,1,2]. Tente resolver sem
     * usar uma cópia da array.
     *
     * @param  array $list
     * @param  int $index
     * @return array
     */
    public function exercise1RotateArray($list, $index)
    {
        $fixed = [];
        $moved = [];

        foreach ($list as $key => $value) {
            if ($key >= $index) {
                array_push($moved, $value);
            } else {
                array_push($fixed, $value);
            }
        }

        return array_merge($moved, $fixed);
    }

    /**
     * Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no início os
     * números pares de forma crescente e depois, os ímpares de forma decrescente.
     *
     * @param  array $array
     * @return array
     */
    public function exercise2ReorderAndSort($list)
    {
        $odd = [];
        $even = [];

        foreach ($list as $key => $value) {
            if ($value % 2 > 0) {
                $odd[] = $value;
            } else {
                $even[] = $value;
            }
        }

        $even = $this->__sort($even, 'asc');
        $odd = $this->__sort($odd, 'desc');

        return array_merge($even, $odd);
    }

    /**
     * Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial e final
     * recebidos no formato dd/mm/aaaa. Não deve usar funções de data e hora.
     *
     * @param  string $start
     * @param  string $end
     * @return array
     */
    public function exercise3DiffInDays($start, $end)
    {
        // very simple implementation. doest not handle
        // leap yers and differences in month days.

        $startParts = explode('/', $start);
        $endParts = explode('/', $end);

        $start = ['year' => $startParts[2], 'month' => $startParts[1], 'day' => $startParts[0]];
        $end = ['year' => $endParts[2], 'month' => $endParts[1], 'day' => $endParts[0]];

        $days = $end['day'] - $start['day'];

        $days = $days + (($end['month'] - $start['month']) * 30);

        $days = $days + (($end['year'] - $start['year']) * 365);

        return $days;
    }

    /**
     * Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais
     * triângulos é possível formar usando estas medidas. Exemplo [abc], [abd] ....
     *
     * @param  array $list
     * @return array
     */
    public function exercise4FindTriangles($list)
    {
        $count = 0;
        $found = [];

        for ($a = 0; $a <= count($list) - 1; $a++) {
            for ($b = $a + 1; $b <= count($list) - 1; $b++) {
                for ($c = $b + 1; $c <= count($list) - 1; $c++) {
                    if ($list[$a] + $list[$b] > $list[$c]
                        && $list[$a] + $list[$c] > $list[$b]
                        && $list[$c] + $list[$b] > $list[$a]) {
                        $count++;
                        $found[] = [$list[$a], $list[$b], $list[$c]];
                    }
                }
            }
        }

        return ['total' => $count, 'triangles' => $found];
    }

    /**
     * Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. (Não usar funções de
     * busca em string).
     *
     * @param  string $substr
     * @param  string $string
     * @return int
     */
    public function exercise5FindSubstring($substr, $string)
    {
        $substrLength = strlen($substr);
        $stringLength = strlen($string);

        for ($i = 0; $i <= ($stringLength - $substrLength); $i++) {

            $j = 0;
            while ($j < $substrLength) {
                if ($string[$i + $j] != $substr[$j]) {
                    break;
                }
                $j++;
            }

            if ($j == $substrLength) {
                return $i;
            }
        }

        throw new \Exception("Not found in string.", 1);
    }

    /**
     *  -- não resolvido --
     * Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano cartesiano e
     * calcule a área do retângulo criado pela sobreposição. Deve receber como entrada dois
     * retângulos formados por pontos, ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma
     * saída informando a área calculada ou zero se não ocorrer sobreposição.
     *
     * @return void
     */
    public function exercise6OverlapRectangles()
    {
        throw new \Exception("Not implemented.", 1);
    }

    /**
     *  -- não resolvido --
     * Um algoritmo deve armazenar o mapa abaixo e listar os caminhos entre os pontos A e E.
     *
     * @return void
     */
    public function exercise7FindPaths()
    {
        throw new \Exception("Not implemented.", 1);
    }

    /**
     * Simple ascending or descending array sorting.
     *
     * @param  array $list
     * @param  string $direction
     * @return array
     */
    public function __sort($list, $direction = 'asc')
    {
        if ($direction === 'asc') {
            for ($i = 0; $i <= count($list) - 1; $i++) {
                for ($j = $i; $j <= count($list) - 1; $j++) {
                    $keep = null;
                    if ($list[$i] > $list[$j]) {
                        $keep = $list[$j];
                        $list[$j] = $list[$i];
                        $list[$i] = $keep;
                    }
                }
            }
        }

        if ($direction === 'desc') {
            for ($i = 0; $i <= count($list) - 1; $i++) {
                for ($j = $i; $j <= count($list) - 1; $j++) {
                    $keep = null;
                    if ($list[$i] < $list[$j]) {
                        $keep = $list[$j];
                        $list[$j] = $list[$i];
                        $list[$i] = $keep;
                    }
                }
            }
        }

        return $list;
    }

    /**
     * Simple die and dump helper.
     *
     * @param  mixed $data
     * @return void
     */
    public function __dd($data)
    {
        var_dump($data);die();
    }
}

(new BlingExercises());
