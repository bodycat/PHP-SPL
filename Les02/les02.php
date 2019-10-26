<?php 
// (С реального собеседования) По заданной строке найдите размер самой длинной подстроки без повторяющихся символов. Вернуть числовой ответ.

// Примеры:
// Input: "abcabcbb"
// Output: 3
// Пояснение: Ответ "abc",с длиной 3.
// .
// Input: "bbbbb"
// Output: 1
// Пояснение: Ответ "b" с длиной 1.
// .
// Input: "pwwkew"
// Output: 3
// Пояснение: Ответ "wke" с длиной 3. Обратите внимание, что ответ должен быть подстрокой. Последовательность pwke является подпоследовательностью, но не подстрокой.
// Не забудьте проверить функцию на возможные варианты :) 

// $str = 'abcabcbb';
// Ответ abc
// с длиной 3

// $str = 'bbbbb';
// Ответ b
// с длиной 1

// $str = 'pwwkew';
// Ответ wke
// с длиной 3

$str = 'pppppapa';
// Ответ pa
// с длиной 2

function isEqualSymbols($first, $second)
{
    return $first == $second;
}
function isEqualFirstSymbolsInString($anyStr, $symbol)
{
    return $anyStr == $symbol;
}
function isFirstStrMore($first, $second)
{
    return strlen($first) >= strlen($second);
}
function isSymbolInString($symbol, $string)
{
    for ($i = 0; $i < strlen($string) - 1; $i++) {
        if ($symbol == $string[$i]) {
            return true;
        }
        return false;
    }
}

$sizeString = strlen($str);
$firstSymbolInSubStr = ''; 
$saveSymbols = ''; 
$maxStr = $str[0];
for ($i = 0; $i + 1 < $sizeString; $i++) {
    if (!isEqualSymbols($str[$i], $str[$i + 1])) { 
        $saveSymbols .= $str[$i];        
        if (isSymbolInString($str[$i + 1], $saveSymbols)) {
            if (isFirstStrMore($saveSymbols, $maxStr)) {
                $maxStr=$saveSymbols;
                $saveSymbols = '';                
            }
        }
    } 
    else {            
        if (strlen($saveSymbols)<=1&&isFirstStrMore($saveSymbols, $maxStr)) {
            $maxStr=$saveSymbols.$str[$i];           
            $saveSymbols = '';
        } 
    }
}

echo "Ответ " . $maxStr . PHP_EOL;
echo "с длиной " . strlen($maxStr) . PHP_EOL;

// $str = 'pppppapa';
// Ответ pa
// с длиной 2
// [Finished in 0.2s]
 ?>