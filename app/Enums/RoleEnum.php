<?php

namespace App\Enums;

enum RoleEnum: int
{
    case SUPER_ADMIN = 1;
    case SELLER = 2;
    case WARE_HOUSE_MANAGER = 3;
    case HUMAN_RESOURCE = 4;


}
