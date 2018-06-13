<?php
/**
 * Created by PhpStorm.
 * User: alisa
 * Date: 13.06.18
 * Time: 13:40
 */?>

<p>{{Auth::user()->email}}</p>
<a href="/logout">Logout</a>

@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
