<?php

namespace Hcode;

use Rain\Tpl;

class Page
{
    private $tlp;
    private $options;
    private $defaults = [
        "data" => []
    ];

    public function __construct(array $opts = [])
    {

        $this->options = array_merge($this->defaults, $opts);

        $configs = [
            "tpl_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views/",
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"] . "/views-cache/",
            "debug" => false
        ];

        Tpl::configure($configs);

        $this->tlp = new Tpl();

        $this->setData($this->options["data"]);

        $this->tpl->draw("header");
    }

    public function setTpl($nome, $data = [], $returnHtml = false)
    {
    }

    private function setData(array $data)
    {
        foreach ($data as $key => $option) {
            $this->tpl->assign($key, $option);
        }
    }

    public function __destruct()
    {
        $this->tpl->draw("footer");
    }
}
