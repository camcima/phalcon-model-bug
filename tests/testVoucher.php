<?php

use Phalcon\DI;

class VoucherTest extends \PHPUnit_Framework_TestCase
{
    const FIXTURE_USER = 'fixture_user';
    const FIXTURE_ORDER = 'fixture_order';

    /**
     * @var \Phalcon\Db\Adapter\Pdo
     */
    protected $db;

    /**
     * @var \Phalcon\DI 
     */
    protected $di;

    /**
     * @var array
     */
    protected $fixtures;

    /**
     * Test Setup
     */
    protected function setUp()
    {
        parent::setUp();
        $this->di = DI::getDefault();
        $this->db = $this->di['db'];
        $this->truncateTables();
        $this->createTestFixtures();
    }

    /**
     * Truncate database tables prior to each test
     */
    protected function truncateTables()
    {
        $this->db->execute("DELETE FROM vouchers");
        $this->db->execute("DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'vouchers'");
        $this->db->execute("DELETE FROM orders");
        $this->db->execute("DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'orders'");
        $this->db->execute("DELETE FROM users");
        $this->db->execute("DELETE FROM SQLITE_SEQUENCE WHERE NAME = 'users'");
    }

    protected function createTestFixtures()
    {
        $user = new User();
        $user->setHash(md5(uniqid()));
        $user->setName('John');
        $user->setCreatedAt('2014-01-01 12:00:00');
        $user->create();
        $this->fixtures[self::FIXTURE_USER] = $user;

        $order = new Order();
        $order->setHash(md5(uniqid()));
        $order->setOrderNumber(1234);
        $order->setCreatedAt('2014-01-02 12:00:00');
        $order->create();
        $this->fixtures[self::FIXTURE_ORDER] = $order;
    }

    public function testCreateVoucher1()
    {
        $order = $this->fixtures[self::FIXTURE_ORDER];
        /* @var $order Order */
        
        $user = $this->fixtures[self::FIXTURE_USER];
        /* @var $user User */
        
        $voucher = new Voucher();
        $voucher->setHash(md5(uniqid()));
        $voucher->order = $order;
        $voucher->user = $user;
        $voucher->setCode('VOUCHERCODE');
        $voucher->setAmount(12.34);
        $voucher->setCreatedAt('2014-01-03 12:00:00');
        $voucher->create();
        
        $fetchVoucher = Voucher::findFirst($voucher->getId());
        
        $this->assertEquals($voucher->getHash(), $fetchVoucher->getHash());
        $this->assertEquals($order->getHash(), $voucher->order->getHash());
    }

    public function testCreateVoucher2()
    {
        $order = $this->fixtures[self::FIXTURE_ORDER];
        /* @var $order Order */
        
        $user = $this->fixtures[self::FIXTURE_USER];
        /* @var $user User */
        
        $voucher = new Voucher();
        $voucher->setHash(md5(uniqid()));
        $voucher->order = $order;
        $voucher->user = $user;
        $voucher->setCode('VOUCHERCODE');
        $voucher->setAmount(12.34);
        $voucher->setCreatedAt('2014-01-03 12:00:00');
        $voucher->create();
        
        $fetchVoucher = Voucher::findFirst($voucher->getId());
        
        $this->assertEquals($voucher->getHash(), $fetchVoucher->getHash());
        $this->assertEquals($order->getHash(), $voucher->order->getHash());
    }

    public function testCreateVoucher3()
    {
        $order = $this->fixtures[self::FIXTURE_ORDER];
        /* @var $order Order */
        
        $user = $this->fixtures[self::FIXTURE_USER];
        /* @var $user User */
        
        $voucher = new Voucher();
        $voucher->setHash(md5(uniqid()));
        $voucher->order = $order;
        $voucher->user = $user;
        $voucher->setCode('VOUCHERCODE');
        $voucher->setAmount(12.34);
        $voucher->setCreatedAt('2014-01-03 12:00:00');
        $voucher->create();
        
        $fetchVoucher = Voucher::findFirst($voucher->getId());
        
        $this->assertEquals($voucher->getHash(), $fetchVoucher->getHash());
        $this->assertEquals($order->getHash(), $voucher->order->getHash());
    }

    public function testCreateVoucher4()
    {
        $order = $this->fixtures[self::FIXTURE_ORDER];
        /* @var $order Order */
        
        $user = $this->fixtures[self::FIXTURE_USER];
        /* @var $user User */
        
        $voucher = new Voucher();
        $voucher->setHash(md5(uniqid()));
        $voucher->order = $order;
        $voucher->user = $user;
        $voucher->setCode('VOUCHERCODE');
        $voucher->setAmount(12.34);
        $voucher->setCreatedAt('2014-01-03 12:00:00');
        $voucher->create();
        
        $fetchVoucher = Voucher::findFirst($voucher->getId());
        
        $this->assertEquals($voucher->getHash(), $fetchVoucher->getHash());
        $this->assertEquals($order->getHash(), $voucher->order->getHash());
    }

    public function testCreateVoucher5()
    {
        $order = $this->fixtures[self::FIXTURE_ORDER];
        /* @var $order Order */
        
        $user = $this->fixtures[self::FIXTURE_USER];
        /* @var $user User */
        
        $voucher = new Voucher();
        $voucher->setHash(md5(uniqid()));
        $voucher->order = $order;
        $voucher->user = $user;
        $voucher->setCode('VOUCHERCODE');
        $voucher->setAmount(12.34);
        $voucher->setCreatedAt('2014-01-03 12:00:00');
        $voucher->create();
        
        $fetchVoucher = Voucher::findFirst($voucher->getId());
        
        $this->assertEquals($voucher->getHash(), $fetchVoucher->getHash());
        $this->assertEquals($order->getHash(), $voucher->order->getHash());
    }
}