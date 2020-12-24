# Exercícios Bling

### Algoritmos e lógica
- Como se trata de avaliação de lógica e não de conhecimento específico de linguagem, evitar
uso de funções nativas da linguagem para ordenação, strings ou de arrays
- Todos devem ler entradas

1. Escrever um algoritmo que rotacione um array em k posições. Exemplo: o array [1,2,3,4,5,6]
se for girado duas posições para a esquerda se torna [3,4,5,6,1,2]. Tente resolver sem
usar uma cópia da array.

Solução: https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L36

2. Criar um algoritmo que leia um vetor de números e reordene este vetor contendo no início os
números pares de forma crescente e depois, os ímpares de forma decrescente.

Solução: https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L59

3. Escreva um algoritmo que calcule o tempo em dias a partir de uma data inicial e final
recebidos no formato dd/mm/aaaa. Não deve usar funções de data e hora.

Solução: https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L86

4. Receba 6 números representando medidas a,b,c,d,e e f e relacionar quantos e quais
triângulos é possível formar usando estas medidas. Exemplo [abc], [abd] ....

Solução: https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L113

5. Um algoritmo deve buscar um sub-texto dentro de um texto fornecido. (Não usar funções de
busca em string).

Solução: https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L142

6. Criar um algoritmo que teste se dois retângulos se sobrepõem em um plano cartesiano e
calcule a área do retângulo criado pela sobreposição. Deve receber como entrada dois
retângulos formados por pontos, ex: (0,0),(2,2),(2,0),(0,2),(1,0),(1,2),(6,0),(6,2) e gerar uma
saída informando a área calculada ou zero se não ocorrer sobreposição.

Solução: **-- não resolvido --** https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L174

7. Um algoritmo deve armazenar o mapa abaixo e listar os caminhos entre os pontos A e E.

Solução: **-- não resolvido --** https://github.com/wdarking/bling_exercises/blob/master/BlingExercises.php#L185

### Orientação a objetos e design patterns
Implementar um padrão iterator no modelo abaixo. Apresentar o dIagrama de classes e
pseudocódigo.

Solução: https://github.com/wdarking/bling_exercises/blob/master/bling_uml.png
Solução: https://github.com/wdarking/bling_exercises/blob/master/Pseudocode.php

### SQL - Modelo relacional
Considere o diagrama E-R abaixo

- Definir as cardinalidades máximas e mínimas

Solução:
- atores->filmes: n,n
- filmes->atores n,n

- Criar o esquema do banco e apresentar o DDL utilizado

Solução: https://github.com/wdarking/bling_exercises/blob/master/bling.sql

- Apresentar o SQL para as seguintes consultas
- Atores do filme com título “XYZ”

Solução: `SELECT * FROM atores JOIN ator_filme ON atores.id = ator_filme.ator_id JOIN filmes ON ator_filme.filme_id = filmes.id WHERE filmes.titulo = 'XYZ'`

- Filmes que o ator de nome “FULANO” participou

Solução: `SELECT * FROM filmes JOIN ator_filme ON filmes.id = ator_filme.filme_id JOIN atores ON ator_filme.ator_id = atores.id WHERE atores.nome = 'FULANO' AND ator_filme.funcao = 'participante'`

- Listar os filmes do ano 2015 ordenados pelo quantidade de atores participantes e pelo
título em ordem alfabética.

Solução: `SELECT filmes.titulo, filmes.ano, COUNT(filmes.id) as total_participantes FROM filmes JOIN ator_filme ON filmes.id = ator_filme.filme_id WHERE filmes.ano = '2015' AND ator_filme.funcao = 'participante' GROUP BY filmes.id
ORDER BY filmes.titulo ASC, total_participantes DESC`

- Listar os atores que trabalharam em filmes cujo diretor foi “SPIELBERG”

Solução: `SELECT * FROM atores JOIN ator_filme ON ator_filme.ator_id = atores.id WHERE ator_filme.filme_id IN (SELECT filmes.id FROM filmes WHERE filmes.id IN (SELECT ator_filme.filme_id FROM ator_filme JOIN atores ON atores.id = ator_filme.ator_id WHERE atores.nome = 'SPIELBERG' and ator_filme.funcao = 'diretor')) AND ator_filme.funcao = 'participante'`
