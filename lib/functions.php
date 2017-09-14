<?php

/**
 * Start header html
 */
function startHeader()
{
    $string = "<!DOCTYPE html>\n<html>\n<head>\n";
    echo $string;
}

/**
 * Include style css
 */
function includeStyle($filename)
{
    global $area;
    $path = BASE_URL . "/public/" . $area . "/css/" . $filename;
    includeExternalStyle($path);
}

/**
 * Include style css html
 */
function includeExternalStyle($location)
{
    $string = "<link rel='stylesheet' type='text/css' href='" . $location . "' />\n";
    echo $string;
}

/**
 * Include script
 */
function includeScript($filename)
{
    global $area;
    $path = BASE_URL . "/public/" . $area . "/js/" . $filename;
    includeExternalScript($path);
}

/**
 * Include script html
 */
function includeExternalScript($location)
{
    $string = "<script type='text/javascript' src='" . $location . "'></script>\n";
    echo $string;
}


/**
 * start title html
 */
function setTitle($title)
{
    echo "<title>" . $title . "</title>\n";
}

/**
 * End header html
 */
function endHeader()
{
    echo "</head>\n<body>\n";
}

/**
 * End tag html
 */
function getFooter()
{
    echo "\n</body>\n</html>";
}

/**
 * Include path image
 */

function includeImage($folder, $img)
{
    global $area;
    $path = BASE_URL . "/public/" . $area . "/img/" . $folder . $img;
    return $path;
}


/**
 * Get image
 */
function getImage($imgName)
{
    $path = BASE_URL . "/public/uploads/" . $imgName;
    echo $path;
}


/**
 * Notify script
 */
function notifyScript($stringNotify)
{
    echo "<script>";
    echo "alert('$stringNotify');";
    echo "</script>";
}


/**
 * Redirect page with javascript
 */
function directScript($stringNotify, $location)
{
    echo "<script>";
    echo "setTimeout(
        function() {
            alert('$stringNotify');
            window.location = ('$location');
        }
    , 500);";
    echo "</script>";
}


/**
 * Tranfer money format
 */
function moneyFormat($value)
{
    $data = array();
    $count = count($value);
    $result = number_format($value, ((int)$count / 3), ",", ".");
    return $result;
}

/**
 * Redirect page
 */
function redirect($location)
{
    if (!empty($location)) {
        header("location: " . $location);
    }
}


/**
 * Get value posted
 */
function getValue($item)
{
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            return checkExits($_POST, $item);
            break;
        case 'GET':
            return checkExits($_GET, $item);
            break;
    }
}

/**
 * Return array of url getted
 */
function urlAnalyze()
{
    global $url;
    $url = rtrim($url, "/");
    $urlArray = explode("/", $url);

    return $urlArray;
}

/**
 * Format data input
 */
function trimInput($data)
{
    $data = trim($data);

    return $data;
}

/**
 * Delete file
 */

function deleteFile($file)
{
    if (empty(basename($file))) {
        return true;
    }

    $path = DIR_UPLOAD . basename($file);
    if (file_exists($path)) {
        return unlink($path);
    }
}

/**
 * Get path link
 */
function pathShow($model, $field, $sort, $page, $search)
{
    if (empty($_GET['search'])) {            //if not searching data
        $path = BASE_URL . $model . '?field=' . $field . '&sort=' . $sort . '&page=' . $page;
    } else {
        $path = BASE_URL . $model . '?search=' . $search . '&field=' . $field . '&sort=' . $sort . '&page=' . $page;
    }

    echo $path;
}

function checkExits($data, $field = false)
{
    if (empty($field) || empty($data[$field])) {
        $data[$field] = false;
    }

    return $data[$field];
}

function getData($data, $field = false)
{
    if (empty($field) || empty($data[$field])) {
        $data[$field] = null;
    }

    echo $data[$field];
}

function getSortType($sortBy)
{
    $sortType = empty($_GET['sort']) ? '' : $_GET['sort'];
    $sortField = empty($_GET['field']) ? '' : $_GET['field'];

    if ((strtolower($sortField) != strtolower($sortBy)) || (strtolower($sortType) == 'desc')) {
        return 'asc';
    }

    return 'desc';
}

function getDateFormat($value){
    return date_format(date_create($value), "h:i:s d/m/Y");
}

function dd($data, $exitFlag = true)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    if ($exitFlag) {
        exit;
    }
}

?>