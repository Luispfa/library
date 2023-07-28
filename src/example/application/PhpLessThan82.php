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
$orderDetail = null;
if (null != $order) {
    if (null != $order->details()) {
        if (null != $order->details()->first()) {
            $orderDetail = $order->details()->first()->detail();
        }
    }
}

//expresiones throw
if (null != $order) {
    echo $order;
} else {
    throw new \Exception();
}

//propiedades de promocion
final class Order
{
    private int $orderId;
    private string $name;
    private string $email;
    private string $status;
    private float $totalPrice;

    public function __construct(
        int $orderId,
        string $name,
        string $email,
        string $status,
        float $totalPrice
    ) {
        $this->orderId = $orderId;
        $this->name = $name;
        $this->email = $email;
        $this->status = $status;
        $this->totalPrice = $totalPrice;
    }
}

//match expresion
$status = 1;
$response = null;
switch ($status) {
    case 1:
        $response = "Is one";
        break;
    case 2:
        $response = "two";
        break;
    case 3:
        $response = "three";
        break;
    default:
        $response = "undefinied";
        break;
}

echo $response;


/** PHP 8.2 */
/** read only class */
class PhpUpdateHelperLessThan82
{
    public function __construct(
        public readonly string $title,
        public readonly string $status
    ) {
    }

    /** Union and intersectio types */
    public function bar(mixed $entity)
    {
        if ((($entity instanceof A) && ($entity instanceof B)) || ($entity === null)) {
            return $entity;
        }

        throw new Exception('Invalid entity');
    }

    /**Allow null, false, and true as stand-alone types */
    /** tipos independientes */
    public function almostFalse(): bool
    { /* ... */
    }

    public function almostTrue(): bool
    { /* ... */
    }

    public function almostNull(): string|null
    { /* ... */
    }
}


/** Deprecate dynamic properties */
class User
{
    public $name;
}

$user = new User();
$user->lastName = 'Doe';

$user = new \stdClass();
$user->lastName = 'Doe';
