<?php

/** PHP 8 */
//operador null safe
class Order
{
    public function details(): ?array
    {
        return null;
    }
}

$order = new Order();
$orderDetail = $order?->details()?->first()?->detail();

//mixed
class OrderA
{
    //object|resource|array|string|float|int|bool|null. 
    public function squareArea(mixed $side): int
    {
        return $side * $side;
    }
}

//union types
class OrderB
{
    public function squareArea(int|float $side): int|float
    {
        return $side * $side;
    }

    public function userLoad(int $id): User|false
    {
    }

    public function foo(): void|null
    {
    } //not allowed
}

$order = new OrderB;
$area = $order->squareArea(5);
$area = $order->squareArea(5.1);


//expresiones throw
echo $order ?? throw new Exception();

try {
    echo $order ?? throw new Exception();
} catch (\Exception) {
    echo "some error";
}

//propiedades de promocion
final class Order
{
   public function __construct(
        private int $orderId,
        private string $name,
        private string $email,
        private string $status,
        private float $totalPrice
    ) {
    }

    public function details(): string
    {
        return "$this->orderId: $this->name";
    }
}

//match expresion
$status = 1;
$response = match($status){
    1 => "Is one",
    2 => "two",
    3 => "three",
    default => "undefinied"
}

echo $response;

//name arguments
final class OrderC
{
    public function __construct(
        private int $orderId,
        private string $name,
        private string $email,
        private bool $allowed
    ) {
    }
}

$order = new OrderC(
    orderId: '124fgfwe-rf3ww22mv',
    name: 'order 1',
    email: 'email@email.com',
    allowed: false
);


/** PHP 8.2 */
/** read only class */
readonly class PhpUpdateHelperLessThan82
{
    public function __construct(
        public string $title,
        public string $status)
    {
    }

    /** Union and intersectio types */
    public function bar( (A&B)|null $entity): (A&B)|null
    {
        return $entity;
    }

    /**Allow null, false, and true as stand-alone types */
    /** tipos independientes */
    public function alwaysFalse(): false
    { /* ... */
    }

    public function alwaysTrue(): true
    { /* ... */
    }

    public function alwaysNull(): null
    { /* ... */
    }
}

/** Deprecate dynamic properties */
class User
{
    public $name;
}

$user = new User();
$user->lastName = 'Doe'; // Deprecated notice

$user = new \stdClass();
$user->lastName = 'Doe'; // Still allowed

/** Enum 8.1*/

enum Status: string
{
    case Pending = 'P';
    case Active = 'A';
    case Suspended = 'S';

    public function label(): string
    {
        return match($this) {
            static::Pending => 'Pending',
            static::Active => 'Active',
            static::Suspended => 'Suspended',
            static::CanceledByUser => 'Canceled by user',
        };
    }
}

print_r(Status::Pending);
echo "\n";
print_r(Status::Pending->value);
echo "\n";
print_r(Status::Pending->name);
echo "\n";
print_r(Status::Pending->label());












