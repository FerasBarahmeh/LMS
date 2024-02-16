<?php

namespace App\Enums;

enum NotifyThrough
{
    /**
     * Mail
     */
    case Mail;

    /**
     * Database
     */
    case DB;

    /**
     * Mail and Database
     */
    case MDB;
}
