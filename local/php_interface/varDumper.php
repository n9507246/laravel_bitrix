<? 
use Symfony\Component\VarDumper\VarDumper;

function dump(...$vars) {
    foreach ($vars as $var) {
        VarDumper::dump($var);
    }
}

function dd(...$vars) {
    foreach ($vars as $var) {
        VarDumper::dump($var);
    }
    die;
}