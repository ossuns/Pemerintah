<?php
function diff_date($start, $end='') {
        $end = ($end=='') ? date("Y-m-d H:i:s") : $end;
        $datetime_start = new \DateTime($start);
        $datetime_end = new \DateTime($end);
        $interval = $datetime_start->diff($datetime_end);
        $time['y'] = (int)$interval->format('%y');
        $time['m'] = (int)$interval->format('%m');
        $time['d'] = (int)$interval->format('%d');

        if($time['y'] !==0) $time['y'] = $time['y']+365;
        if($time['m'] !==0) $time['m'] = $time['m']+30;


        $result = $time['y']+$time['m']+$time['d'];

        return $result;
    }