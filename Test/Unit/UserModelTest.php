<?php

namespace app\Test\Unit;

use app\models\UserModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    protected $model;

    public function setUp(): void
    {
        $this->model = new UserModel();
    }

    /**
     * @covers UserModel::getAPI
     */
    public function testGetApiIsArray()
    {
        $data = $this->model->getAPI();
        $this->assertIsArray($data);
    }

    /**
     * @covers UserModel::getAPI
     */
    public function testGetApiArrayHasKey()
    {
        $data = $this->model->getAPI();
        $this->assertArrayHasKey('name', $data[0]);
    }

    /**
     * @covers UserModel::getByIdAPI
     */
    public function testGetByIdApiIsArray()
    {
        $data = $this->model->getByIdAPI("4425");
        $this->assertIsArray($data);
    }

    /**
     * @covers UserModel::getByIdAPI
     */
    public function testGetByIdApiArrayHasKey()
    {
        $data = $this->model->getByIdAPI("4425");
        $this->assertArrayHasKey('id', $data);
    }

    /**
     * @covers UserModel::getByIdAPI
     */
    public function testGetByIdApiEquals()
    {
        $data = $this->model->getByIdAPI("4425");
        $this->assertEquals([
            'id' => 4425,
            'name' => "Satish Johar",
            'email' => "satish_johar@zulauf.info",
            'gender' => "female",
            'status' => "inactive"
        ], $data);
    }
}
