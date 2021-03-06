# viaCEP PHP
[![GitHub license](https://img.shields.io/github/license/JosenildoLS/viaCEP-PHP.svg?style=flat-square)](https://github.com/JosenildoLS/viaCEP-PHP/blob/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/JosenildoLS/viaCEP-PHP.svg?style=flat-square)](https://github.com/JosenildoLS/viaCEP-PHP/issues)
[![GitHub forks](https://img.shields.io/github/forks/JosenildoLS/viaCEP-PHP.svg?style=flat-square)](https://github.com/JosenildoLS/viaCEP-PHP/network)
[![GitHub stars](https://img.shields.io/github/stars/JosenildoLS/viaCEP-PHP.svg?style=flat-square)](https://github.com/JosenildoLS/viaCEP-PHP/stargazers)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/JosenildoLS/viaCEP-PHP.svg?style=social&style=flat-square)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FJosenildoLS%2FviaCEP-PHP)

Faça busca por endereços do Brasil utilizando o [ViaCEP](https://viacep.com.br) REST API.

## Instalação

Via Composer

``` bash
$ composer require josenildols/viacep-php
```

## Como instanciar

``` php

use JosenildoLS\viaCEP;

$cep = new viaCEP();
$cep->find('01001-000');

```

### Retorno em Array

``` php
$array = $cep->toArray();

/*
O resultado deverá ser algo assim:

Array
(
    [cep] => 01001-000
    [logradouro] => Praça da Sé
    [complemento] => lado ímpar
    [bairro] => Sé
    [localidade] => São Paulo
    [uf] => SP
    [unidade] =>
    [ibge] => 3550308
    [gia] => 1004
)

*/
```

### Retorno JSON

``` php
$json = $cep->toJson();

/*
O resultado deverá ser algo assim:

{
    cep: "01001-000",
    logradouro: "Praça da Sé",
    complemento: "lado ímpar",
    bairro: "Sé",
    localidade: "São Paulo",
    uf: "SP",
    unidade: "",
    ibge: "3550308",
    gia: "1004"
}
*/
```

### Retorno Piped

``` php
$piped = $cep->toPiped();

/*
O resultado deverá ser algo assim:

cep:01001-000|logradouro:Praça da Sé|complemento:lado ímpar|bairro:Sé|localidade:São Paulo|uf:SP|unidade:|ibge:3550308|gia:1004
*/
```

### Retorno Querty

``` php
$querty = $cep->toQuerty();

/*
O resultado deverá ser algo assim:

cep=01001-000&logradouro=Pra%C3%A7a+da+S%C3%A9&complemento=lado+%C3%ADmpar&bairro=S%C3%A9&localidade=S%C3%A3o+Paulo&uf=SP&unidade=&ibge=3550308&gia=1004
*/
```

### Salvar em .XML

``` php
$cep->toXML("nome_da_pasta");

/*
O resultado deverá ser algo assim, devo ressaltar que o nome_da_pasta é opcional:

<?xml version="1.0" encoding="UTF-8"?>
<xmlcep>
	<cep>01001-000</cep>
	<logradouro>Praça da Sé</logradouro>
	<complemento>lado ímpar</complemento>
	<bairro>Sé</bairro>
	<localidade>São Paulo</localidade>
	<uf>SP</uf>
	<unidade></unidade>
	<ibge>3550308</ibge>
	<gia>1004</gia>
</xmlcep>

*/
```

### Salvar em .CSV

``` php
$cep->toCSV("nome_da_pasta");

/*
O resultado deverá ser algo assim, devo ressaltar que o nome_da_pastaé opcional:

cep,logradouro,complemento,bairro,localidade,uf,unidade,ibge,gia
01001-000,Praça da Sé,lado ímpar,Sé,São Paulo,SP,,3550308,1004

*/
```


## Licença

Sobre a licença MIT (MIT). Por favor, veja [License File](LICENSE.md) para mais informações.

