<?php
if(!function_exists('responseApi')){
    function responseApi(array $data = [], $msg = 'OK', array $errors = [], $status = 200){
        return response()->json(compact('data','msg','errors','status'), $status);
    }
}
