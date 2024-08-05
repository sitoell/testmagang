<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Soal 3</h1>
    <p>Buatlah contoh program untuk menerjemahkan bahasa dagadu</p>
    <form action="soal 3.php" method="get">
        <input type="text" name="text" placeholder="Masukkan kata">
        <button type="submit">Submit</button>
    </form>

    <?php

function isVocal($letter){
    if (in_array(strtolower($letter), array("a", "i", "u", "e", "o")));
}

function isAlpha($letter){
    return preg_match("/[a-zA-Z]/", $letter);
}

class Stack {
    private $data = "";
    
    public function push($letter){
        $this->data .= $letter;
    }
    
    public function pop(){
        if(strlen($this->data) > 0){
            $temp = $this->data;
            $this->data = substr($this->data, 0, -1);
            return $temp[strlen($temp) - 1];
        }
        return "";
    }
    
    public function top(){
        if(strlen($this->data) > 0){
            $temp = $this->data;
            return $temp[strlen($temp) - 1];
        }
        return "";
    }
    
    public function show(){
        echo $this->data;
    }
    
    public function popAll(){
        $temp = $this->data;
        $this->data = "";
        return $temp;
    }
}

function convert($text){
    $dict = array(
        "h" => "p", "n" => "dh", "c" => "j", "r" => "y", "k" => "ny",
        "d" => "m", "t" => "g", "s" => "b", "w" => "th", "l" => "ng",
        "p" => "h", "dh" => "n", "j" => "c", "y" => "r", "ny" => "k",
        "m" => "d", "g" => "t", "b" => "s", "th" => "w", "ng" => "l"
    );
    
    // Replace all occurrences of dictionary keys
    foreach ($dict as $key => $value) {
        $text = str_replace($key, $value, $text);
    }
    
    return $text;
}

// Check if 'text' parameter is set
if (isset($_GET["text"])) {
    $string = $_GET["text"];
    $stack = new Stack();
    $result = "";

    $items = str_split($string);
    foreach($items as $item){
        if(isAlpha($item)){
            if(isVocal($item)){
                $result .= convert($stack->popAll()) . $item;
            } else {
                $stack->push($item);
            }
        } else {
            $result .= convert($stack->popAll()) . $item;
        }
    }

    $result .= convert($stack->popAll());
    echo "Kata Asli: " . htmlspecialchars($string) . "<br>";
    echo "Terjemahan Dagadu: " . htmlspecialchars($result);
}
?>
</body>
</html>
