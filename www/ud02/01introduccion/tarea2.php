<?php

/**
 * Indica cuál de los siguientes son nombres de variables válidas e inválidos, indica por qué (en comentarios) y corrige los fallos:
* valor           Invalido: falta el signo dolar al principio. Ejemplo valido: $valor  
* $_N             Valido: Empieza por $ y el nombre empieza por el caracter _ lo cual está permitido.
* $valor_actual   Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras y el caracter _.
* $n              Valido: Empieza por $ y despues unicamente tiene una letra.
* $#datos         Invalido: El nombre de la variable debe comenzar por una letra o el caracter _. Ejemplo valido: $datos 
* $valorInicial0  Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras y numeros.
* $proba,valor    Invalido: El caracter , no está permitido en el nombre de una variable. Ejemplo valido: $probavalor 
* $2saldo         Invalido: El nombre de la variable debe comenzar por una letra o el caracter _. Ejemplo valido: $saldo 
* $n              Valido: Empieza por $ y despues unicamente tiene una letra.
* $meuProblema    Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras.
* $meu Problema   Invalido: No puede haber espacios en el nombre de la variable. Ejemplo valido: $meu_Problema 
* $echo           Valido: Aunque se trata de una palabra reservada en php, se podría usar como nombre de variable aunque no sería recomendable.
* $m&m            Invalido: El caracter , no está permitido en el nombre de una variable. Ejemplo valido: $mym  
* $registro       Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras.
* $ABC            Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras.
* $85 Nome        Invalido: El nombre de la variable no empieza por _ o una letra, y además contiene un espacio. Ejemplo valido: $Nome85
* $AAAAAAAAA      Valido: //Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras.
* $nome_apelidos  Valido: //Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras y el caracter _.
* $saldoActual    Valido: Empieza por $, el nombre empieza por una letra y solo contiene letras.
* $92             Invalido: El nombre de la variable no empieza por _ o una letra. Ejemplo valido: $_92               
* $*143idade      Invalido: El nombre de la variable no empieza por _ o una letra. Ejemplo valido: $_143idade  

 */
?>