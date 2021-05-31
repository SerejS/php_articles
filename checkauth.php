<?php

namespace Auth;

function isAuth($cookies) {

    if (!isset($cookies["user_id"]) || !isset($cookies["token"])) {
        return false;
    }
    return true;
}