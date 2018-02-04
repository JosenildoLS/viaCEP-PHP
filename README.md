# viaCEP
[![Software License][ico-license]](LICENSE.md)
[![Github file size]
[![PHP from Packagist]

Faça uma busca por endereços utilizando o [ViaCEP](https://viacep.com.br) REST API.

## Instalação

Via Composer

``` bash
$ composer require josenildols/viacep
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

### Salvar em XML

``` php
$cep->toXML("caminho");

/*
O resultado deverá ser algo assim, devo resaltar que o caminho é opcional:

<?xml version="1.0" encoding="UTF-8"?><xmlcep>
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

### Salvar em CVS

``` php
$cep->toCSV("caminho");

/*
O resultado deverá ser algo assim, devo resaltar que o caminho é opcional:

cep,logradouro,complemento,bairro,localidade,uf,unidade,ibge,gia
01001-000,Praça da Sé,lado ímpar,Sé,São Paulo,SP,,3550308,1004

*/
```

## Segurança

Caso encontre algum problema relacionado a segurança envie um email para josenildodelimasilva@gmail.com instead.

## Licença

Sobre a licença MIT (MIT). Por favor, veja [License File](LICENSE.md) para mais informações.


[![ico-license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)]()
[![Github file size](https://img.shields.io/github/size/webcaetano/craft/build/phaser-craft.min.js.svg?style=flat-square)]()
[![PHP from Packagist](https://img.shields.io/packagist/php-v/symfony/symfony.svg?style=flat-square)](~5.6|~7.0)
[link-author]: https://github.com/josenildoLS