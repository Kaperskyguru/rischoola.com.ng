<?php

class Pagination extends Logger
{

    private static $instance;
    public $perpage;

    private function __construct()
    {
        $this->perpage = 1;
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function pagination($query, $per_page = 10, $page = 1, $url = '?')
    {
        $query = "SELECT COUNT(*) as `num` FROM {$query}";
        $this->query($query);
        $row = $this->resultset($query);
        $total = $row['num'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total / $per_page);
        $lpm1 = $lastpage - 1;

        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<ul class='pagination'>";
            $pagination .= "<li class='details' style='margin-top:2px'>Page $page of $lastpage</li>";
            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination .= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                    $pagination .= "<li class='dot'>...</li>";
                    $pagination .= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination .= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                    $pagination .= "<li class='dot'>..</li>";
                    $pagination .= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination .= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                } else {
                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>$counter</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $pagination .= "<li><a href='{$url}page=$next'>Next</a></li>";
                $pagination .= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
            } else {
                $pagination .= "<li><a disabled = true class='current'>Next</a></li>";
                $pagination .= "<li><a class='current'>Last</a></li>";
            }
            $pagination .= "</ul>\n";
        }


        return $pagination;
    }

    function getAllPageLinks($count, $href)
    {
        $output = '';
        if (!isset($_GET["page"])) $_GET["page"] = 1;
        if ($this->perpage != 0)
            $pages = ceil($count / $this->perpage);
        if ($pages > 1) {
            if ($_GET["page"] == 1)
                $output = $output . '<span class="link first disabled">&#8810;</span><span class="link disabled">&#60;</span>';
            else
                $output = $output . '<a class="link first" onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a><a class="link" onclick="getresult(\'' . $href . ($_GET["page"] - 1) . '\')" >&#60;</a>';


            if (($_GET["page"] - 3) > 0) {
                if ($_GET["page"] == 1)
                    $output = $output . '<span id=1 class="link current">1</span>';
                else
                    $output = $output . '<a class="link" onclick="getresult(\'' . $href . '1\')" >1</a>';
            }
            if (($_GET["page"] - 3) > 1) {
                $output = $output . '<span class="dot">...</span>';
            }

            for ($i = ($_GET["page"] - 2); $i <= ($_GET["page"] + 2); $i++) {
                if ($i < 1) continue;
                if ($i > $pages) break;
                if ($_GET["page"] == $i)
                    $output = $output . '<span id=' . $i . ' class="link current">' . $i . '</span>';
                else
                    $output = $output . '<a class="link" onclick="getresult(\'' . $href . $i . '\')" >' . $i . '</a>';
            }

            if (($pages - ($_GET["page"] + 2)) > 1) {
                $output = $output . '<span class="dot">...</span>';
            }
            if (($pages - ($_GET["page"] + 2)) > 0) {
                if ($_GET["page"] == $pages)
                    $output = $output . '<span id=' . ($pages) . ' class="link current">' . ($pages) . '</span>';
                else
                    $output = $output . '<a class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >' . ($pages) . '</a>';
            }

            if ($_GET["page"] < $pages)
                $output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"] + 1) . '\')" >></a><a  class="link" onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a>';
            else
                $output = $output . '<span class="link disabled">></span><span class="link disabled">&#8811;</span>';


        }
        return $output;
    }

    function getPrevNext($count, $href)
    {
        $output = '';
        if (!isset($_GET["page"])) $_GET["page"] = 1;
        if ($this->perpage != 0)
            $pages = ceil($count / $this->perpage);
        if ($pages > 1) {
            if ($_GET["page"] == 1)
                $output = $output . '<span class="link disabled first">Prev</span>';
            else
                $output = $output . '<a class="link first" id="clickBTN" url="\'' . $href . ($_GET["page"] - 1) . '\'" >Prev</a>';

            if ($_GET["page"] < $pages)
                $output = $output . '<a  class="link" id="clickBTN" url="\'' . $href . ($_GET["page"] + 1) . '\'" >Next</a>';
            else
                $output = $output . '<span class="link disabled">Next</span>';


        }
        return $output;
    }

    public function pager($table, $per_page = 10, $page = 1, $url = '?'){

        $query = "SELECT COUNT(*) as `num` FROM {$table}";
        $this->query($query);
        $row = $this->resultset($query);
        $total = $row['num'];

        $page = ($page == 0 ? 1 : $page);
        $next = $page + 1;
        $lastpage = ceil($total / $per_page);

        if( $page > 1 && $page < $lastpage) {
            $last = $page - 1;
            echo "<li class='previous'><a href ='{$url}page=$last'>Last 10 Records</a> </li>";
            echo "<li class='next'><a href ='{$url}page=$next'>Next 10 Records</a></li>";
        }else if( $page == 1 ) {
            echo "<li class='next'><a href='{$url}page=$next'>Next 10 Records</a></li>";
        }else if( $page == $lastpage ) {
            $last = $page - 1;
            echo "<li class='previous'><a href='{$url}page=$last'>Last 10 Records</a> </li>";
        }
    }

    public function rowNums(){

    }
}
