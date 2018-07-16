<?php
namespace app\lol\controller;

use think\Controller;
use think\Session;
use think\Request;

use app\lol\model\Score as ScoreModel;

use app\lol\model\Account as AccountModel;



class TransferRecord extends Controller{
    public function Index(){
        return $this->fetch();
    }




    public function GetTransferRecord(){
        $records = ScoreModel::where('user_id', Session::get('id'))
            ->order('create_time', 'desc')
            ->select();
        echo '<table><tr><th>类型</th><th>金额</th><th>对方账户</th><th></th></tr>';

        foreach($records as $record){
            echo '<tr>';

            if($record->type === 0){
                echo '<td>转入</td>';
            }else{
                echo '<td>转出</td>';
            }

            echo '<td>'.$record->ydc.'</td>';
            echo '<td>'.$record->theotherusername.'</td>';
            if($record->status === 1){
                echo '<td>成功</td>';
            }else if($record->status === 2){
                echo '<td>撤销</td>';
            }else if($record->status === 3){
                echo '<td>失败</td>';
            }else if($record->status === 0){
                if($record->type === 0){
                    echo '<td>锁定</td>';
                }else if($record->type === 1){
                    echo '<td><input type="submit" id="transferconfirm'.$record->id.'" value="确认转出" onclick="TransferConfirm('.$record->id.')" formaction="/index.php/lol/transfer_record/transferconfirm?recordid='.$record->id.'"/></td>';
//                    echo '<td><input type="submit" value="确认转出" formaction="/index.php/lol/transfer_record/test" /></td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }


    public function test(){
        dump("123");
    }

    public function TransferConfirm(Request $request){
        $recordid = $request->param('recordid');

        $score = ScoreModel::where('id', $recordid)->find();
        if(empty($score)){
            return '没有此交易单';
        }
        if($score->user_id != Session::get('id')){
            return '没有权限';
        }

        if($score->type === 1 && $score->status === 0){
            //转账
            //score转出状态
            $score->status = 1;
            $score->allowField(true)->save();

            //score转入状态
            $theotherscore = ScoreModel::where('id', $score->anotherid)->find();
            $theotherscore->status = 1;
            $theotherscore->allowField(true)->save();

            //account
            $account = AccountModel::where('id', $theotherscore->user_id)->find();
            $account->ydc += $score->ydc;
            $account->allowField(true)->save();

            $this->success('操作成功');
        }
    }

}