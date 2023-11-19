<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "bookings".
 *
 * @property integer $id
 * @property float $price
 * @property string $name
 * @property string $description
 *
 */
class Products extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['price', 'name'], 'required'],
            [['name', 'description'], 'string'],
            [['price'], 'number', 'min' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'price' => 'Цена товара',
            'name' => 'Название товара',
            'description' => 'Описание товара',
        ];
    }
}