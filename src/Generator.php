<?php

namespace Danmatthews\RandomSecureUrlSafeToken;

class Generator
{
    /**
     * @throws \Exception
     */
    public function generate()
    {
        return $this->base64_url_encode($this->generateRandomString());
    }

    public function base64_url_encode( string $data ): string
    {
        return strtr( base64_encode($data), '+/=', '-_,' );
    }

    /**
     * @throws \Exception
     */
    function generateRandomString(
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string
    {
        $length = 20;
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces [] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
}
