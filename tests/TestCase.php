<?php

namespace Test;


class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * Return the content of a json file
     * @param string $path
     * @return object|array
     */
    public function getJSONFileContent($path)
    {
        return json_decode(file_get_contents($path));
    }

}