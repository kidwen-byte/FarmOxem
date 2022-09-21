<?php

class Farm {

    public $name;
    public $quantity;
    public $products;

    public function __construct($name = null, $quantity = null, $products = null) { // метод конструктор для создания экземпляра c параметрами 
        $this->name = $name;
        $this->quantity = $quantity;
        $this->products = $products;
    }

    public function registrationAnimals($params) { // метод для подсчета животных и продукцию
     $count_products = 0;
        foreach ($params as $item) {
            $count_products += $item['count_products']; // собираем продукцию за 1 день
            $count = count($params); // считаем животных 
        } 
        $count_products = $count_products * 7; // считаем продукцию за 7 дней
        var_dump("В хлеву живет {$count} {$this->name}, в среднем они производят {$count_products} {$this->products} в неделю");
    }
}

class Animals extends Farm {

    private static $cows = []; // статический массив для сохранения предыдущих данных
    private static $chickens = []; // статический массив для сохранения предыдущих данных

    public function addCows() {
        for ($i = 0; $i < $this->quantity; $i++) { // формируем массив для подсчета животных и продукции (в $this->quantity находится цисло переданное при создании экземпляра)
            $cow['count_products'] = rand(8, 12); // Корова может давать 8-12 литров молока за один надой
            self::$cows[] = $cow; // запись в статческий массив
        }
        parent::registrationAnimals(self::$cows); // передаем массив Farm для дальнейшей обработки
    }

    public function addChicken() { // тут всё аналогично верхнему методу
        for ($i = 0; $i < $this->quantity; $i++) {
            $chicken['count_products'] = rand(0, 1);
            self::$chickens[] = $chicken;
        }
        parent::registrationAnimals(self::$chickens);
    }
}

$cows = new Animals('коровы', 10, 'молоко'); // Cоздания экземпляра c параметрами (имя животного, количество, производимая продукция)
$cows->addCows($cows);

$cows = new Animals('курицы', 20, 'яйца');
$cows->addChicken();


// Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
$cows = new Animals('коровы', 1, 'молоко');
$cows->addCows();

$cows = new Animals('курицы', 5, 'яйца');
$cows->addChicken();