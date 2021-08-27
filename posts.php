<?php

/**
 * posts.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - functions.php içerisinde oluşturacağınız `getRandomPostCount` fonksiyonunuza min
 * ve max değerleri gönderip bu fonksiyondan rastgele bir tam sayı elde etmeniz
 * gerekiyor. (min ve max için istediğiniz değerleri seçebilirsiniz. Random bir
 * tam sayı elde etmek için `rand` (https://www.php.net/manual/en/function.rand.php)
 * fonksiyonunu kullanabilirsiniz.)
 *
 * - Elde ettiğiniz bu sayıyı da kullanarak `getLatestPosts` fonksiyonunu
 * çalıştırmalısınız. Bu fonksiyondan aldığınız diziyi kullanarak `post.php` betik
 * dosyasını döngü içinde dahil etmeli ve her yazı için detayları göstermelisiniz.
 */

require_once("functions.php"); //Dosyayı birkez getirmek istediğimizden ve parametre olarak verdiğimiz dosya yolu bulunamazsa error verip çalışmasını durduğu için kullanmak istedim

$randomPostCount = getRandomPostCount(1, 100); // 1 ila 100 arasında rasgele sayı döndürür
$posts = getLatestPosts($randomPostCount); // rasgele post sayı değerine göre son postları dizi olarak getirir

  foreach ($posts as $id => $post) {
      include('post.php'); // diziyi kullanarak `post.php` betik dosyasını döngü içinde dahil etme
     }           

         ?>

