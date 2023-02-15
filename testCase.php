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
        if ($testcase[$i][2] == true) {
            if (is_int(newAct($testcase[$i][0], $testcase[$i][1])) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            if (newAct($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        }
        echo "<br>";
    }
}

function testDeposit() {
    echo "<br><br>test deposit<br><br>";
    $testcase = [
        //測試存款功能
        [1,1,1],
        //帳號不存在
        [99999,1,0],
        //存款金額
        [1,0,1],
        [1,-100,0]
    ];
    for ($i = 0; $i < count($testcase); $i++) { 
        echo "testing {$testcase[$i][0]}, {$testcase[$i][1]}: ";
        if ($testcase[$i][2] == true) {
            if (deposit($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            if (deposit($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        }
        echo "<br>";
    }
}

function testWithdraw() {
    echo "<br><br>test withdraw<br><br>";
    echo deposit(3,10000);
    echo deposit(4,10000);
    $testcase = [
        //測試提款
        [3,10000,1],
        [4,10000,1],
        //測試額度
        [3,1,0],
        [4,1,0]
    ];
    for ($i = 0; $i < count($testcase); $i++) { 
        echo "testing {$testcase[$i][0]}, {$testcase[$i][1]}: ";
        if ($testcase[$i][2] == true) {
            if (withdraw($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            if (withdraw($testcase[$i][0], $testcase[$i][1]) == $testcase[$i][2]) {
                echo "ok";
            } else {
                echo "error";
            }
        }
        echo "<br>";
    }
}

?>
<?php
    testNewAct();
    testDeposit();
    testWithdraw();
?>