/*----------------------------------------------------------------------------------------------------
                                    ЗАДАНИЕ
Реализуйте функцию normalizeUrl(), которая выполняет так называемую нормализацию данных.
Она принимает адрес сайта и возвращает его с https:// в начале.
Функция принимает адреса в виде:
 * АДРЕС
 * http://АДРЕС
 * https://АДРЕС
Но всегда возвращает URL в виде https://АДРЕС
*/


function normalizeUrl($url)
{
    $pos = strpos($url, 'https://', $offset=0); // есть ли строка 'needle' в переменной $url, начиная с 1-го символа.
    if ($pos === false) {
        if (strpos($url, 'http://', $offset=0) === false) {
            $new_url = 'https://'.$url;
            return $new_url;
        } else {
            $new_url = 'https'.substr($url, 4);
//Обрезаем строку: substr("abcdef", -3 (сдвиг: если минус, то влево), 1(длина выходной строки); // возвращает "d"
            return $new_url;
        }
    } else {
        return $url;
    }
}

//For testing the function
print_r(normalizeUrl('http://google.com'));
