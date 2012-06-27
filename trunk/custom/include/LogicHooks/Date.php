<?php
  
/**
 * Calculate differences between two dates with precise semantics. Based on PHPs DateTime::diff()
 * implementation by Derick Rethans. Ported to PHP by Emil H, 2011-05-02. No rights reserved.
 * 
 * See here for original code:
 * http://svn.php.net/viewvc/php/php-src/trunk/ext/date/lib/tm2unixtime.c?revision=302890&view=markup
 * http://svn.php.net/viewvc/php/php-src/trunk/ext/date/lib/interval.c?revision=298973&view=markup
 */
    Class Date{
        function dateRangeLimit($start, $end, $adj, $a, $b, $result)
        {
            if ($result[$a] < $start) {
                $result[$b] -= intval(($start - $result[$a] - 1) / $adj) + 1;
                $result[$a] += $adj * intval(($start - $result[$a] - 1) / $adj + 1);
            }

            if ($result[$a] >= $end) {
                $result[$b] += intval($result[$a] / $adj);
                $result[$a] -= $adj * intval($result[$a] / $adj);
            }

            return $result;
        }

        function dateRangeLimitDays($base, $result)
        {
            $days_in_month_leap = array(31, 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
            $days_in_month = array(31, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

            $this->dateRangeLimit(1, 13, 12, "m", "y", $base);

            $year = $base["y"];
            $month = $base["m"];

            if (!$result["invert"]) {
                while ($result["d"] < 0) {
                    $month--;
                    if ($month < 1) {
                        $month += 12;
                        $year--;
                    }

                    $leapyear = $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0);
                    $days = $leapyear ? $days_in_month_leap[$month] : $days_in_month[$month];

                    $result["d"] += $days;
                    $result["m"]--;
                }
            } else {
                while ($result["d"] < 0) {
                    $leapyear = $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0);
                    $days = $leapyear ? $days_in_month_leap[$month] : $days_in_month[$month];

                    $result["d"] += $days;
                    $result["m"]--;

                    $month++;
                    if ($month > 12) {
                        $month -= 12;
                        $year++;
                    }
                }
            }

            return $result;
        }

        function dateNormalize($base, $result)
        {
            $result = $this->dateRangeLimit(0, 60, 60, "s", "i", $result);
            $result = $this->dateRangeLimit(0, 60, 60, "i", "h", $result);
            $result = $this->dateRangeLimit(0, 24, 24, "h", "d", $result);
            $result = $this->dateRangeLimit(0, 12, 12, "m", "y", $result);

            $result = $this->dateRangeLimitDays($base, $result);

            $result = $this->dateRangeLimit(0, 12, 12, "m", "y", $result);

            return $result;
        }

        /**
         * Accepts two unix timestamps.
         */
        function dateDiff($one, $two)
        {
            $invert = false;
            if ($one > $two) {
                list($one, $two) = array($two, $one);
                $invert = true;
            }

            $key = array("y", "m", "d", "h", "i", "s");
            $a = array_combine($key, array_map("intval", explode(" ", date("Y m d H i s", $one))));
            $b = array_combine($key, array_map("intval", explode(" ", date("Y m d H i s", $two))));

            $result = array();
            $result["y"] = $b["y"] - $a["y"];
            $result["m"] = $b["m"] - $a["m"];
            $result["d"] = $b["d"] - $a["d"];
            $result["h"] = $b["h"] - $a["h"];
            $result["i"] = $b["i"] - $a["i"];
            $result["s"] = $b["s"] - $a["s"];
            $result["invert"] = $invert ? 1 : 0;
            $result["days"] = intval(abs(($one - $two)/86400));

            if ($invert) {
                $this->dateNormalize($a, $result);
            } else {
                $this->dateNormalize($b, $result);
            }

            return $result;
        }
    }
?>
