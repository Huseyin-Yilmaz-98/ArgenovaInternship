<?php
function content_to_html($content_string)
{
    $html = "";
    $current_type = "<paragraph>";
    foreach (explode("\n", $content_string) as $line_original) {
        $line = trim($line_original);
        if ($line == "") continue;
        else if ($line == "<quote>") {
            $html .= '<blockquote class="blockquote fst-italic bg-light p-5 fs-6 text-muted mb-3">';
            $html .= '<i class="fa fa-quote-left text-primary fs-3"></i>';
            $current_type = $line;
        } else if ($line == "</quote>") {
            $html .= '</blockquote>';
            $current_type = "<paragraph>";
        } else if ($line == '<author>') {
            $html .= '<figcaption class="blockquote-footer mt-3 ms-2">';
            $current_type = $line;
        } else if ($line == '</author>') {
            $html .= '</figcaption>';
            $current_type = "<paragraph>";
        } else if ($line == '<header>') {
            $html .= '<h3 class="fw-bold my-4">';
            $current_type = $line;
        } else if ($line == '</header>') {
            $html .= '</h3>';
            $current_type = "<paragraph>";
        } else if ($line == '<list>') {
            $html .= '<ul class="mx-3 mb-3">';
            $current_type = $line;
        } else if ($line == '</list>') {
            $html .= '</ul>';
            $current_type = "<paragraph>";
        } else if ($line == '<img>') {
            $current_type = $line;
        } else if ($line == '</img>') {
            $current_type = "<paragraph>";
        } else {
            switch ($current_type) {
                case '<paragraph>':
                    $html .= '<p class="my-5">';
                    $html .= $line;
                    $html .= '</p>';
                    break;
                case '<quote>':
                    $html .= '<p class="my-3 ms-2">';
                    $html .= $line;
                    $html .= '</p>';
                    break;
                case '<author>':
                    $html .= $line;
                    break;
                case '<header>':
                    $html .= $line;
                    break;
                case '<list>':
                    $html .= '<li>';
                    $html .= $line;
                    $html .= '</li>';
                    break;
                case '<img>':
                    $html .= '<img src="images/Blog/';
                    $html .= $line;
                    $html .= '" class="w-100 h-auto mb-4">';
                    break;
            }
        }
    }
    return $html;
}

function title_to_url($title){
    return preg_replace('/[^a-zA-Z0-9_ -]/s','-',$title);
}