<?php 
// 抽象クラス Shape を定義（他のクラスで継承されるべき基底クラス）
abstract class Shape {
  // 名前を格納するプロパティ
  protected $name;

  // 抽象メソッド（サブクラスで必ず実装される必要がある）
  abstract public function calculateArea(); 

  // コンストラクタ（オブジェクト生成時に名前を設定）
  public function __construct($name) {
    $this->name = $name; // 名前プロパティに値を代入
  }

  // 具体的なメソッド（クラスのインスタンスの名前を取得）
  public function getName() {
    return $this->name; // 名前プロパティの値を返す
  }
}

// サブクラス Circle を定義（Shape クラスを継承）
class Circle extends Shape {
  private $radius; // 半径を格納するプロパティ

  public function __construct($name, $radius) {
    parent::__construct($name); // 親クラスのコンストラクタを呼び出し
    $this->radius = $radius; // 半径プロパティに値を代入
  }

  public function calculateArea()
  {
    return pi() * pow($this->radius, 2); // 円の面積を計算 pow() はべき乗を計算する関数
  }
}

$circle = new Circle('Circle', 3); // Circle クラスのインスタンスを生成

var_dump($circle); // 'Circle' と 3 が表示される


class Rectangle extends Shape {
  private $width; // 幅を格納するプロパティ
  private $height; // 高さを格納するプロパティ

  public function __construct($name, $width, $height) {
    parent::__construct($name); // 親クラスのコンストラクタを呼び出し
    $this->width = $width; // 幅プロパティに値を代入
    $this->height = $height; // 高さプロパティに値を代入
  }

  public function calculateArea()
  {
    return $this->width * $this->height; // 長方形の面積を計算
  }
}

$circle = new Circle('Circle', 3); // Circle クラスのインスタンスを生成

$rectangle = new Rectangle('Rectangle', 3, 4); // Rectangle クラスのインスタンスを生成

echo $circle->getName() . ' area: ' . $circle->calculateArea() . '<br>'; // 'Circle area: 28.274333882308'