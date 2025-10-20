<?php

namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case TAXPAYER = 'taxpayer';
    case AUDITOR = 'auditor';
    case ACCOUNTANT = 'accountant';
}
