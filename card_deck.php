<?php
class Card {
    private string $rank;
    private string $suit;
    
    public function __construct(string $rank, string $suit) {
        $this->rank = $rank;
        $this->suit = $suit;
    }
    
    // オブジェクトを文字列に変換するためのメソッド
    public function __toString() {
        return $this->rank . $this->suit;
    }
}


class Deck {
    public static array $RANKS = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
    public static array $SUITS = array("♠", "♡", "♢", "♣");
    private array $cards;
    
    public function __construct() {
        $this->cards = self::createDeck();
    }
    
    // 52枚のカードを生成する静的メソッド
    public static function createDeck() {
        $cards = array();
        $s = count(self::$SUITS);
        $r = count(self::$RANKS);
        
        for ($i = 0; $i < $s; $i++) {
            for ($j = 0; $j < $r; $j++) {
                $cards[] = new Card(self::$RANKS[$j], self::$SUITS[$i]);
            }
        }
        return $cards;
    }
    
    // カードの配列をその場でシャッフルする静的メソッド（副作用あり）
    public static function shuffleDeckInPlace(array &$cards) {
        shuffle($cards);
    }
    
    // カードの配列をコピーしてシャッフルし、新しい配列を返す静的メソッド（副作用なし）
    public static function shuffleDeckOutOfPlace(array $cards) {
        $copy = $cards; // 配列のコピーを作成
        shuffle($copy);
        return $copy;
    }
    
    // オブジェクトを文字列に変換するためのメソッド
    public function __toString() {
        return self::cardsToString($this->cards);
    }
    
    // カード配列を文字列に変換するメソッド（5枚ごとに空白を挿入）
    public static function cardsToString(array $inputCards) {
        $s = "";
        $len = count($inputCards);
        for ($i = 0; $i < $len; $i++) {
            $s .= $inputCards[$i]->__toString();
            if ($i % 5 == 4) {
                $s .= " ";
            }
        }
        return $s;
    }
}

// 初期のデッキの状態を表示
echo "初期のデッキ:\n";
$deck = new Deck();
echo $deck . "\n\n";

// createDeck() を利用してカード配列を生成（順番は初期状態）
echo "createDeck() で生成されたカード配列:\n";
$myCards = Deck::createDeck();
echo Deck::cardsToString($myCards) . "\n\n";

// shuffleDeckInPlace() を利用して、カード配列をその場でシャッフル（副作用あり）
echo "shuffleDeckInPlace() を使用してシャッフルした後のカード配列:\n";
Deck::shuffleDeckInPlace($myCards);
echo Deck::cardsToString($myCards) . "\n\n";

// shuffleDeckOutOfPlace() を利用して、カード配列をコピーしてシャッフル（副作用なし）
echo "shuffleDeckOutOfPlace() を使用して新たにシャッフルされたカード配列:\n";
$myCardsCopy = Deck::shuffleDeckOutOfPlace($myCards);
echo Deck::cardsToString($myCardsCopy) . "\n\n";

// shuffleDeckOutOfPlace() を使っても元の配列が変更されていないか確認f
echo "shuffleDeckOutOfPlace() 後の元のカード配列（変更されていないことを確認）:\n";
echo Deck::cardsToString($myCards) . "\n";
?>
