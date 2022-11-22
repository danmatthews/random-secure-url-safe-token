<?php

test('test generating a secure URL token a bunch of times and determine they have the same length', function () {
    $generator = new \Danmatthews\RandomSecureUrlSafeToken\Generator();
    for ($i = 0; $i < 1000; $i++) {
        $string = $generator->generate();
        expect($string)
            ->toBeString()
            ->toHaveLength(28);
    }
});

test('test generating a bunch (1M) strings and ensure they don\'t clash', function () {
    $iterations = 1_000_000;
    $generator = new \Danmatthews\RandomSecureUrlSafeToken\Generator();
    $results = [];
    for ($i = 0; $i < $iterations; $i++) {
        $string = $generator->generate();
        $results[] = $string;
    }
    expect($results)->toHaveLength($iterations)->and(array_unique($results))->toHaveLength($iterations);
});
