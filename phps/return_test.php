<?php
class sandwich
{
    private $_completed = false;
 
    public function create($bread_num = 2, $beef_num = 1, $tomato_num = 1)
    {
        $this->_setBread($bread_num)    // パンをセット
             ->_setBeef($beef_num)      // 牛肉をセット
             ->_setTomato($tomato_num); // トマトをセット
 
        echo 'サンドイッチ完成' . PHP_EOL;
        $this->_completed = true;
 
        return $this;
    }
 
    public function eat()
    {
        if($this->_completed) {
            echo 'ごちそうさまでした' . PHP_EOL;
 
            // 食べたのでなくなった
            $this->_completed = false;
        } else {
            echo 'どこにある？' . PHP_EOL;
        }
        return $this;
    }
 
    private function _setBread($num)
    {
        /*
         * パンを準備した自身をリターン
         */
        return $this;
    }
 
    private function _setBeef($num)
    {
        /*
         * 牛肉をのせた自身をリターン
         */
        return $this;
    }
 
    private function _setTomato($num)
    {
        /*
         * トマトをのせた自身をリターン
         */
        return $this;
    }
}
 
// 使い方
$sandwich = new sandwich();
$sandwich->create()  // 作って
         ->eat()     // 食べて
         ->create()  // 作って
         ->eat()     // 食べて
         ->eat();    // 食べて
 
// 出力
//-------------------------------------
// サンドイッチ完成
// ごちそうさまでした
// サンドイッチ完成
// ごちそうさまでした
// どこにある？
//

?>