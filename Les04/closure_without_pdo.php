<?php
// Реализовать вывод меню на основе Clojure table без PDO.

$connect = mysqli_connect("localhost", "root", "", "php_spl");
$sql = "select * from php_spl.categories as c
inner join php_spl.category_links as cl on c.id_category = cl.child_id";
$result = mysqli_query($connect, $sql);
$ranks = [];
while ($rank = mysqli_fetch_assoc($result)) {
    $ranks[$rank["level"]] [$rank["parent_id"]] = $rank;
}
function renderLevel($arr){
    $str = '<ul>';
    if (is_array($arr)) {
        foreach ($arr as $k => $level) {
            $str .= '<li> Каталог '. $k ;
            $str .= renderChild($level);
            $str .= '</li>';
        }
    }
    return $str.'</ul>';
}
function renderChild($level) {
    $str = '<ul>';
    if (is_array($level)) {
        foreach ($level as $k => $child) {
            $str .= '<li>'. $child['category_name'];
            array_splice($level, 0, 1);
            $str .= renderChild( $level );
            $str .= '</li>';
        }
    }
    $str .= "</ul>";
    return $str;
}
echo renderLevel($ranks);