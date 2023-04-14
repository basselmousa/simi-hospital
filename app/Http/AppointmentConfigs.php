<?php


namespace App\Http;


class AppointmentConfigs
{

    public static $types = [
        'Clinic',
        'Home'
    ];

    public static $days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
    ];

    public static $statuses = [
        'Pending', 'Accepted', 'Rejected', 'Canceled','Re-Appoint', 'Done'
    ];


}
