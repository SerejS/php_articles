<?php

namespace Auth;

function isAuth($cookies) {

    if (!isset($cookies["user_id"]) || !isset($cookies["token"])) {
        return false;
    }
    return true;
}

function isOwner($author) {
    if (!isset($cookies["user_id"]) || !isset($cookies["token"]) || $cookies['user_id'] != $author) {
        return false;
    }
    return true;
}