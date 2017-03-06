<?php

namespace system;

class CShop{

    static function buy($value){
        Temp::load("vip");
        Temp::compile('content');
        Temp::clear();
    }

}