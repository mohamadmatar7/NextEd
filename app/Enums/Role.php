<?php
// namespace App\Enums;

// class Role
// {
//     const ADMIN = 4;
//     const PRINCIPAL = 3;
//     const INSTRUCTOR = 2;
//     const TEACHER = 1;
//     const STUDENT = 0;
// }

namespace App\Enums;

class Role
{
    const ADMIN = 4;
    const PRINCIPAL = 3;
    const INSTRUCTOR = 2;
    const TEACHER = 1;
    const STUDENT = 0;

    public static function getDescription($role)
    {
        switch ($role) {
            case self::ADMIN:
                return 'Admin';
            case self::PRINCIPAL:
                return 'Principal';
            case self::INSTRUCTOR:
                return 'Instructor';
            case self::TEACHER:
                return 'Teacher';
            case self::STUDENT:
                return 'Student';
            default:
                return 'Unknown Role';
        }
    }
}
