<?php

function flash($message)
{
    $flash = app('App\Http\Flash');
    return $flash->message($message);
}
//proba dumpovanja metoda iz helpera
//  function proba()
// {
//     return "Proba";
// }

function flyer_path(App\Flyer $flyer)
{
    return $flyer->zip . '/' . str_replace('', '-', $flyer->street);
}
