<?php

namespace BDFM;

class Parser
{
    public static $rules = array(
        '/^#([^#\n]*)\n/' => "<h1>$1</h1>\n",
        '/##([^\n]*)\n/' => "<h2>$1</h2>\n",
        '/\[([^\[]+)\]\(([^\)]+)\)/' => '<a href=\'\2\'>\1</a>',
        '/___EAT___/' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Broccoli_and_cross_section_edit.jpg/320px-Broccoli_and_cross_section_edit.jpg" title="Broccoli is yummy!" alt="A lovely picture of broccoli" />',
        '/([^\n]*)\n\n/' => "<p>$1</p>\n\n",
        '/(.*\n.*)$/' => '<p>$1</p>',

    );

    public static function parse($text)
    {
        foreach (self::$rules as $regex => $replacement) {
            $text = preg_replace($regex, $replacement, $text);
        }
        return trim($text);
    }

}
