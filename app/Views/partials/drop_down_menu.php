<?php
function dropdown_menu(string $label, array $items): string
{
    $html = '<div class="nav-dropdown">
        <a class="login-btn" type="button">' . htmlspecialchars($label) . '</a>

        <div class="nav-dropdown-menu">';

    foreach ($items as $text => $url) {
        $html .= '<a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($text) . '</a>';
    }

    $html .= '</div></div>';

    return $html;
}


