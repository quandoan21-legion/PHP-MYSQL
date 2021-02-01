<?php
class test
{

    public function orWhere($rawOrWhere)
    {
        $c = array();
        $keys = array_keys($rawOrWhere);
        for ($i = 0; $i < count($rawOrWhere); $i++) {
            $a = array();
            array_push($a, $keys[$i], '"' . $rawOrWhere[$keys[$i]] . '"');
            $b = implode(" = ", $a);
            array_push($c, $b);
        }
        $this->where = implode(" AND ", $c);
        return $this;
    }

    
}
