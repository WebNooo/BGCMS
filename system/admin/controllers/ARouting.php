<?php

namespace admin;

class ARouting
{

    static function index()
    {
        echo "<div class=\"card\">
                    <div class=\"card__header\">
                        <h2>Перенеаправления <small>Редактиование перенаплений</small></h2>
                    </div>

                    <div class=\"card__body\">
                    <div class=\"alert alert--dark\">
                    <h4>Так же вы можете использовать в get запросе:</h4>
                    <b>:any</b> - разрешить любые символы<br>
                    <b>:num</b> - разрешить только цифры<br>
                    в результирующее выражение записываются как $1, $2 и т.д. по порядку
                    <br>
                    <br>
                    <small>Пример:</small> /user/id-<b>:num</b>/name-<b>:any</b> = <small>/user/id-<b>45</b>/name-<b>jony</b></small>
                    <br>
                    <br>
                    <b>{%index%}</b> равна переменной конфига <b>\$site_index_mode</b>
                    </div>
                        <br><br>
                        <div style='text-align: left'><button name='add_routing' class='btn btn-success'><i class='zmdi zmdi-plus'></i> Добавить новый маршрут</button></div> 
                    <br>

                        <div class=\"table-responsive\">
                            <table id='table_routing' class=\"table table-hover\">
                                <thead>
                                <tr>
                                    <th>Аддресс</th>
                                    <th>Функция</th>
                                    <th>Название</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>";
        $i = 0;
        $file = fopen(SYS . "/data/routing.php", "r");
        while (!feof($file)) {
            $str = trim(fgets($file));
            if (!empty($str)) {
                $list = explode('|', $str);
                $check = ($list[3] == "yes") ?  "checked" : "";
                echo "              <tr>
                                        <td><input class='form-control' title='' type='text' name='route[$i-0]' value='$list[0]'/></td>
                                        <td><input class='form-control' title='' type='text' name='route[$i-1]' value='$list[1]'/></td>
                                        <td><input class='form-control' title='' type='text' name='route[$i-2]' value='$list[2]'/></td>
                                        <td><div class='toggle-switch'><input class='toggle-switch__checkbox' title='' type='checkbox' name='route[$i-3]' $check /><i class='toggle-switch__helper'></i></div></td>
                                        <td><button class='btn btn--light btn--icon' onclick='deleteRow(this)'><i style='color: red;' class='zmdi zmdi-close'></i></button></td>
                                    </tr>";
                $i++;
            }
        }
        fclose($file);

        echo "                  </tbody>
                            </table>
                        </div>
                       <div style='text-align: center'><button name='save_routing' class='btn btn-success'>Сохранить</button></div> 
                    </div>
                </div>";
    }

    static function saveRouting($data)
    {
        $arr = array_chunk($data['route'], 4);
        $string = "";
        foreach ($arr as $value) {
            $check = (empty($value[3])) ? "no" : $value[3];
            $string .= trim($value[0]) . "|" . trim($value[1]) . "|" . trim($value[2]) . "|" . $check . "\n";
        }
        $file = fopen(SYS . '/data/routing.php', "w");
        fwrite($file, $string);
        fclose($file);

        AMain::jsi("success","Маршруты успешно сохранены");
    }

}