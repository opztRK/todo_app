<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //マジックナンバー（意味不明な数値）を回避する為に
    //constで固定値を定義する
    const STATUS =[
        1 => ['label' => '未着手', 'class' => 'label-danger' ],
        2 => ['label' => '作業中', 'class' => 'label-info' ],
        3 => ['label' => '完了', 'class'=>''],
    ];


    /**
     * 状態のラベル
     * 
     * @return string
     */
    public function getStatusLabelAttribute(){

        //状態値をstatusに代入
        $status = $this->attributes['status'];

        //定義されていなければ空文字を返す
        if(!isset(self::STATUS[$status])){
            return '';
        }

        //↓が$tasks->status_labelになる
        return self::STATUS[$status]['label'];


    }

    /**
     * 状態の色
     * 
     */
    public function getStatusClassAttribute(){

        $status = $this->attributes['status'];

        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat('Y-m-d',$this->attributes['due_date'])
        ->format('Y年m月d日');
    }

}
