<?php

require __DIR__ . '/../src/sum.php';

describe('Number Tools', function () {
  it('adding 1 + 2', function () {
    expect(sum(1, 2))->toBe(3);
  });

  it('adding 3 + 2', function () {
    expect(sum(3, 2))->toBe(5);
  });
});
 