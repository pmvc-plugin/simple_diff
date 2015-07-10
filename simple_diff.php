<?php
namespace PMVC\PlugIn\simple_diff;


${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\simple_diff';

class simple_diff extends \PMVC\PlugIn
{
    public function diff($a, $b)
    {
        $first = $this->headDiff($a, $b);
        $firstlen = strlen($first);
        $last = $this->endDiff($a, $b);
        $lastLen = strlen($last);
        $arr = array(
        $first,
        array(
            substr($a, $firstlen, strlen($a)-$firstlen-$lastLen),
            substr($b, $firstlen, strlen($b)-$firstlen-$lastLen)
        ),
        $last
    );
        return $arr;
    }

    public function headDiff($a, $b)
    {
        $arr = array(
                strlen($a),
                strlen($b)
                );
        sort($arr);
        $same='';
        for ($i=0, $j=$arr[1];$i<$j;$i++) {
            if ($a[$i]===$b[$i]) {
                $same.=$a[$i];
            } else {
                break;
            }
        }
        return $same;
    }

    public function endDiff($a, $b)
    {
        $alen = strlen($a);
        $blen = strlen($b);
        $arr = array(
            $alen,
            $blen
        );
        sort($arr);
        $same='';
        for ($i=1, $j=$arr[1];$i<=$j;$i++) {
            $ai=$alen-$i;
            $bi=$blen-$i;
            if ($a[$ai]===$b[$bi]) {
                $same=$a[$ai].$same;
            } else {
                break;
            }
        }
        return $same;
    }
}
