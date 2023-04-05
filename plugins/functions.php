<?php

function addStylesToHeader(): string
{
    return '<style>body { background: #fafafa; }</style>';
}
do_action('register_header', 'addStylesToHeader');
function addAnother(): void
{
    echo '<style>header { color: red; }</style>';
}
do_action('register_header', 'addAnother');

function addBody(): void
{
    echo '
        <h1>Main Content</h1>
        This text registered by register_body
        ';
}
do_action('register_body', 'addBody');

function addFooter(): void
{
    echo '
    <footer>
        <h1>Footer</h1>
    </footer>
    ';
}
do_action('register_footer', 'addFooter');


