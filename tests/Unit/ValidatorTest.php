<?php

use \Core\Validator;
use \Core\Authenticator;

it('validates a string', function () {
    expect(Validator::string('foobar'))->toBeTrue()
        ->and(Validator::string(false))->toBeFalse()
        ->and(Validator::string(''))->toBeFalse();
});

it('validates a string with a minimum length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email('foobar'))->toBeFalse()
        ->and(Validator::email('foobar@ex.com'))->toBeTrue();
});

it('validates that number is greater than give amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue()
        ->and(Validator::greaterThan(1, 2))->toBeFalse();
});

it('validate that the correct user has been logged in', function () {
    session_start();
    (new Authenticator)->login(
        ['email' => 'lav@lav.com'
        ]);
    expect($_SESSION['user']['email'])->toBe('lav@lav.com');
})->only();



