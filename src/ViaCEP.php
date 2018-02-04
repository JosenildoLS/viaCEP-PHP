<?php

namespace JosenildoLS;

class ViaCEP {

    const URL_VIACEP = 'http://viacep.com.br/ws/';

    private $zipCode;
    private $street;
    private $complement;
    private $neighborhood;
    private $city;
    private $state;
    private $unity;
    private $ibge;
    private $gia;

    /*
     * Paramentros padrão para requisição
     */
    private $method = "json";
    private $unicode = "";
    private $callback = "";

    public function __construct($zipCode, $method = "", $unicode = FALSE, $callback = "") {

        $this->setZipCode($zipCode);
        $this->setMethod($method);
        $this->setUnicode($unicode);
        $this->setCallback($callback);
    }

    public function __toString() {
        return $url = self::URL_VIACEP . $this->getZipCode() . '/' . $this->getMethod() . $this->getUnicode() . $this->getCallback();
    }

    public function fill(array $attributes) {
        if ($attributes) {
            $this->zipCode = $attributes['cep'];
            $this->street = $attributes['logradouro'];
            $this->complement = $attributes['complemento'];
            $this->neighborhood = $attributes['bairro'];
            $this->city = $attributes['localidade'];
            $this->state = $attributes['uf'];
            $this->ibge = $attributes['ibge'];
        }

        return $this;
    }

    public function find() {

        $url = self::URL_VIACEP . $this->getZipCode() . '/' . $this->getMethod() . $this->getUnicode() . $this->getCallback();
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch);
        curl_close($ch);

        if ($this->getCallback() === "" && substr($this->getMethod(), 0, 4) === "json") {
            $data = json_decode($response, true);
            if (array_key_exists('erro', $data) && $data['erro'] === true) {
                return $this->address;
            }
            return $this->fill($data);
        }

        $this->fill($this->jsonp_decode($response, true));

        return $response;
    }

    private function jsonp_decode($jsonp, $assoc = false) { // PHP 5.3 adds depth as third parameter to json_decode
        if ($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
            $jsonp = substr($jsonp, strpos($jsonp, '('));
        }
        return json_decode(trim($jsonp, '();'), $assoc);
    }

    public function toJson() {
        return json_encode(get_object_vars($this));
    }

    public function toArray() {
        return get_object_vars($this);
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function getNeighborhood() {
        return $this->neighborhood;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getUnity() {
        return $this->unity;
    }

    public function getIbge() {
        return $this->ibge;
    }

    public function getGia() {
        return $this->gia;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getUnicode() {
        return $this->unicode;
    }

    public function getCallback() {
        return $this->callback;
    }

    public function setMethod($method) {
        $this->method = $method . '/';
    }

    public function setUnicode($unicode) {
        if (substr($this->getMethod(), 0, 4) === "json" && $unicode === true) {
            $this->unicode = 'unicode/';
        }
    }

    public function setCallback($callback) {
        if (!empty($callback) && substr($this->getMethod(), 0, 4) === "json") {
            $this->callback = '?callback=' . $callback;
        }
    }

    private function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    private function setStreet($street) {
        $this->street = $street;
    }

    private function setComplement($complement) {
        $this->complement = $complement;
    }

    private function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
    }

    private function setCity($city) {
        $this->city = $city;
    }

    private function setState($state) {
        $this->state = $state;
    }

    private function setUnity($unity) {
        $this->unity = $unity;
    }

    private function setIbge($ibge) {
        $this->ibge = $ibge;
    }

    private function setGia($gia) {
        $this->gia = $gia;
    }

}
