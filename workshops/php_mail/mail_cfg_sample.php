<?php
/**
 * Created by IntelliJ IDEA.
 * User: jaszczomp
 * Date: 2019.04.07
 * Time: 16:39
 */

$mail_config = [
    'gmail' => [
        'server' => 'smtp.googlemail.com',
        'encrypt' => 'SSL',
        'port' => 465,
        'login' => '............@gmail.com',
        'passwd' => '...............',
    ],
    'o2' => [
        'server' => 'poczta.o2.pl',
        'encrypt' => 'SSL',
        'port' => 465,
        'login' => '............@o2.pl',
        'passwd' => '................',
    ]
];

$recipients = [
    '1' => [
        'email' => '..................',
        'name' => 'SERWIS AA ....',
        'description' => 'Zapytanie o usługi',
    ],
    '2' => [
        'email' => '..................',
        'name' => 'SERWIS BB ...',
        'description' => 'Zapytanie o audyt',
    ],
    '3' => [
        'email' => '..................',
        'name' => 'support ...',
        'description' => 'Zapytanie o serwis',
    ],
];

