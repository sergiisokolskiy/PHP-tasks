/*----------------------------------------------------------------------------------------------------
                                    ЗАДАНИЕ
Реализуйте функцию isPalindrome(), которая принимает на вход слово, определяет является ли оно палиндромом и
возвращает логическое значение.

Для определения является ли слово палиндромом, достаточно сравнивать попарно символ с обоих концов слова.
Если они все равны, то это палиндром. Решите задачу без использования реверса строки (функция strrev()).
----------------------------------------------------------------------------------------------------*/


function isPalindrome($word)
{
    $halfword1 = '';
    $halfword2 ='';
    $length_word = strlen($word);
    $mid = ceil($length_word/2);

    //собираем первую половину слова
    for ($i=0; $i<$mid; $i++) {
        $halfword1 = $halfword1.$word[$i];

    }

    unset($i); //удаляем переменную $i;

    //собираем вторую половину слова
    if ($length_word%2 ==0) {
        for ($i=$length_word-1; $i>=$mid; $i--) {
            $halfword2 = $halfword2.$word[$i];
        }
    } else {
        for ($i=$length_word; $i>=$mid; $i--) {
            $halfword2 = $halfword2.$word[$i-1];
        }
    }


    if ($halfword1 === $halfword2) {
        return true;
    } else {
        return false;
    }
}
      
// II варіант
function isPalindrome($word)
{
    if ($word == strrev($word)) {
        return true;
    } else {
        return false;
    }
}



var_dump(isPalindrome('abs'));
