<?php

namespace Ecommerce;

use Rain\Tpl;

class Page
{
    /**
     * Templates
     *
     * @var Tpl
     */
    private $tpl;
    private $options;
    private $defaults = [
        "data" => []
    ];

    /**
     * Construtor da classe
     *
     * @param array $opts
     */
    public function __construct(array $opts = [])
    {

        $this->options = array_merge($this->defaults, $opts);

        $configs = [
            "tpl_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views/",
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug" => false
        ];

        Tpl::configure($configs);

        $this->tpl = new Tpl();

        $this->setData($this->options["data"]);

        $this->tpl->draw("header");
    }

    /**
     * Desenha um template em tela após o header
     *
     * @param string $nome
     * @param array $data
     * @param boolean $returnHtml
     * @return string|false|null
     */
    public function setTpl(string $nome, array $data = [], bool $returnHtml = false): string|false|null
    {
        $this->setData($data);

        return $this->tpl->draw($nome, $returnHtml);
    }

    /**
     * Seta os parâmetros para a tela
     *
     * @param array $data
     * @return void
     */
    private function setData(array $data)
    {
        foreach ($data as $key => $option) {
            $this->tpl->assign($key, $option);
        }
    }

    /**
     * Destruct padrão da classe
     */
    public function __destruct()
    {
        $this->tpl->draw("footer");
    }
}
