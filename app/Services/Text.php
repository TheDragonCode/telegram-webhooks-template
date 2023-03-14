<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

class Text
{
    protected static array $chars = [
        '*' => '\*',
        '`' => '\`',
    ];

    protected static array $reservedChars = [
        '!' => '\!',
        '#' => '\#',
        '(' => '\(',
        ')' => '\)',
        '+' => '\+',
        '-' => '\-',
        '.' => '\.',
        '=' => '\=',
        '>' => '\>',
        '_' => '\_',
        '{' => '\{',
        '|' => '\|',
        '}' => '\}',
        '~' => '\~',
    ];

    public static function resolve(string $text): string
    {
        $text = static::replace($text, static::$chars);

        return static::replace($text, static::$reservedChars, true);
    }

    protected static function replace(string $text, array $chars, bool $force = false): string
    {
        foreach ($chars as $from => $to) {
            if ($force || Str::substrCount($text, $from) % 2) {
                $text = Str::replace($from, $to, $text);
            }
        }

        return $text;
    }
}
