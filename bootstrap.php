<?php

use Phalcon\DI,
    Phalcon\Db\Adapter\Pdo\Sqlite as Connection,
    Phalcon\Mvc\Model\Manager as ModelsManager,
    Phalcon\Mvc\Model\Metadata\Memory as MetaData,
    Phalcon\Mvc\Model;

$di = new DI();

//Setup a connection
$di->set('db', new Connection(array(
    "dbname" => "sample3.db"
)));

//Set a models manager
$di->set('modelsManager', new ModelsManager());

//Use the memory meta-data adapter or other
$di->set('modelsMetadata', new MetaData());
echo get_class($di);

/**
 * @property Order $order
 * @property User $user
 */
class Voucher extends Model
{
    protected $id;
    protected $hash;
    protected $code;
    protected $amount;
    protected $orderId;
    protected $userId;
    protected $createdAt;

    public function initialize()
    {
        $this->setSource('vouchers');
        $this->useDynamicUpdate(true);
        $this->setup([
            'notNullValidations' => false,
        ]);
        $this->belongsTo('orderId', 'Order', 'id', ['alias' => 'order']);
        $this->belongsTo('userId', 'User', 'id', ['alias' => 'user']);
    }

    public function columnMap()
    {
        return [
            'id' => 'id',
            'hash' => 'hash',
            'code' => 'code',
            'amount' => 'amount',
            'order_id' => 'orderId',
            'user_id' => 'userId',
            'created_at' => 'createdAt',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @param type $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}

/**
 * @property Voucher[] $vouchers
 */
class User extends Model
{
    protected $id;
    protected $hash;
    protected $name;
    protected $createdAt;

    public function initialize()
    {
        $this->setSource('users');
        $this->useDynamicUpdate(true);
        $this->setup([
            'notNullValidations' => false,
        ]);
        $this->hasMany('id', 'Voucher', 'userId', ['alias' => 'vouchers']);
    }

    public function columnMap()
    {
        return [
            'id' => 'id',
            'hash' => 'hash',
            'name' => 'name',
            'created_at' => 'createdAt',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}

/**
 * @property Voucher[] $vouchers
 */
class Order extends Model
{
    protected $id;
    protected $hash;
    protected $orderNumber;
    protected $createdAt;

    public function initialize()
    {
        $this->setSource('orders');
        $this->useDynamicUpdate(true);
        $this->setup([
            'notNullValidations' => false,
        ]);
        $this->hasMany('id', 'Voucher', 'orderId', ['alias' => 'vouchers']);
    }

    public function columnMap()
    {
        return [
            'id' => 'id',
            'hash' => 'hash',
            'order_number' => 'orderNumber',
            'created_at' => 'createdAt',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return int
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $hash
     */
    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @param int $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}