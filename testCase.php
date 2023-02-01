<?php
require("bankModel.php");

function testNewAct()
{
    echo "test new account<br><br>";
    $testcase = [
        // 帳戶輸入為空字串
        ["", 0, 0],
        ["", 1, 0],
        //帳號建立檢查
        ["123456789", 0, true],
        ["ASDJLKGZCV", 1, true],
        // 帳號型態輸入檢查
        ["asdasd0", 0, true],
        ["asdasd1", 1, true],
        ["asdasd2", 2, 0],
        // 舊帳號檢查
        ["E123456789", 0, true],
        ["E123456789", 1, 0],
    ];
    for ($i = 0; $i < count($testcase); $i++) { 
        echo "testing {$testcase[$i][0]}, {$testcase[$i][1]}: ";
        if($testcase[$i][2] == true){
            if(is_int(newAct($testcase[$i][0], $testcase[$i][1])) == $testcase[$i][2]){
                echo "ok";
            } else{
                echo "error";
            }
        } else {
            if(newAct($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else{
                echo "error";
            }
        }
        echo "<br>";
    }
}

?>
<?php
    testNewAct();
?>