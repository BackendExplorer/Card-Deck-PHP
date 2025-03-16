# 🃏 PHP Card Deck

PHPで実装したトランプのデッキ管理プログラム。カードデッキの生成、シャッフル、連結、長さの取得などの操作が可能。

## 詳細説明

| メソッド | 説明 |
|----------|------|
| `__construct()` | コンストラクタ。トランプのデッキを生成します。 |
| `createDeck(): array` | 52枚のカードデッキを作成し、配列として返します。 |
| `shuffleDeckInPlace(array &$cards): void` | 指定したカード配列をその場でシャッフルします（副作用あり）。 |
| `shuffleDeckOutOfPlace(array $cards): array` | 指定したカード配列をコピーしてシャッフルし、新しい配列を返します（副作用なし）。 |
| `cardsToString(array $inputCards): string` | カード配列を文字列に変換し、5枚ごとに空白を挿入してフォーマットします。 |
| `__toString(): string` | オブジェクトを文字列として扱った際に、現在のデッキの文字列を返します。 |

## 使い方

```php
// デッキの作成
$deck = new Deck();
echo $deck . "\n";

// デッキを新しく生成
$myCards = Deck::createDeck();
echo Deck::cardsToString($myCards) . "\n";

// デッキをその場でシャッフル
Deck::shuffleDeckInPlace($myCards);
echo Deck::cardsToString($myCards) . "\n";

// デッキをコピーしてシャッフル（元のデッキは変更されない）
$myCardsCopy = Deck::shuffleDeckOutOfPlace($myCards);
echo Deck::cardsToString($myCardsCopy) . "\n";
```
