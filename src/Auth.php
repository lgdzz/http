<?php

declare (strict_types=1);

namespace lgdz;

class Auth
{
    private $secret;

    /**
     * Auth constructor.
     * @param $secret
     */
    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    public function sign(array $data): string
    {
        $data['secret'] = $this->secret;
        ksort($data);
        $string = http_build_query($data);
        return md5($string);
    }

    public function verify(array $data): bool
    {
        $sign = $data['sign'];
        unset($data['sign']);
        return $this->sign($data) === $sign;
    }
}