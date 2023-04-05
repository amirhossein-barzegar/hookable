<?php

function something(): void
{
    echo 'something';
}
do_action('register_body', 'something');