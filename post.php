<?php

/**
 * post.php
 *
 * Bu betik direk olarak erişilebilir. functions.php'de yaptığınız gibi bir
 * kontrol eklemenize gerek yok.
 *
 * > Dikkat: Bu dosya hem direk çalıştırılabilir hem de `posts.php` dosyasında
 * > 1+ kez içe aktarılmış olabilir.
 *
 * Bu betik dosyası içerisinde functions.php'de yer alan fonksiyonları da kullanarak
 * aşağıdaki işlemleri gerçekleştirmenizi bekliyoruz.
 *
 * - $id değişkeni yoksa "1" değeri ile tanımlanmalı, daha önceden bu değişken
 * tanımlanmışsa değeri değiştirilmemeli. (Kontrol etmek için `isset`
 * (https://www.php.net/manual/en/function.isset.php) kullanılabilir.)
 * - $id için yapılan işlemin aynısı $title ve $type için de yapılmalı. (İstediğiniz
 * değerleri verebilirsiniz)
 * - Bir sonraki adımda ilgili içerik gösterilmeden önce bir div oluşturulmalı ve
 * bu div $type değerine göre arkaplan rengi almalıdır. (urgent=kırmızı,
 * warning=sarı, normal=arkaplan yok)
 * - `getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmeli.
 */
   require_once("functions.php"); //Dosyayı birkez getirmek istediğimizden ve parametre olarak verdiğimiz dosya yolu bulunamazsa error verip çalışmasını durduğu için kullanmak istedim

if(!isset($posts))
{ 

    $randomPostCount = getRandomPostCount(1, 100); // 1-100 arasında rasgele sayı döndürür
    $posts = getLatestPosts($randomPostCount); // rasgele post sayı değerine göre son postları dizi olarak getirir


    foreach($posts as $id => $post){ 
        $id_array[] = $id; // $posts dizisindeki tüm id değerlerini yeni tanımladığımız değişkene ekler.  
    }

    for($i=1; $i<1000; $i++) { 
        if(in_array($i,$id_array)) {  // $i sayısı $id_array dizisinde tanımlı ise,
           continue; // devam et yani bir sonraki değere gider
        } else { 
            $temporal = $i; // Geçici değişkene, $i değişkenini atar
            break; // döngüden çık.
        }
    }

    $id = $temporal; // $id değişkenine geçici değişken değerini atar

    $myPost = [];
    $myPost[$id] = [ 
        "title" => "Hello PHP",
        "type" => "Type Declaration" ];

    $posts[] = $myPost; 

    foreach($myPost as $id => $post) { 
// div $type değerine göre arkaplan rengi oluşturma
        if($post['type'] =="urgent") { 
              echo "<div style = 'background-color:red' >";
        } 
        elseif($post['type'] =="warning") {
              echo "<div style = 'background-color:yellow' >";
        } 
        else {
              echo "<div>";
        }
// Verilen parametrelere göre ekrana detayları getirme
        getPostDetails($id, $post['title']); 
             echo "</div>";
    }
}
// Eğer yukarıda $posts isimli değişken tanımlandıysa aşağıdaki kodları çalıştırır
else { 

        if(!isset($id)){

        foreach($posts as $id => $post){ 
             $id_array[] = $id; // $posts dizisindeki tüm id değerlerini yeni tanımladığımız değişkene ekler.
            }

        for($i=1; $i<1000; $i++) {  
             if(in_array($i,$id_array)) { // $i sayısı $id_array dizisinde tanımlı ise
                 continue; // devam et yani bir sonraki değere gider 
            }    
        else { 
         $temporal = $i; //Geçici değişkene, $i değişkenini atar
                 break; // döngüden çıkar. 
            }
        
        }

  $id = $temporal; //$id değişkenine geçici değişken değerini atar
            }
  $post[$id] = [
  'title' => $post['title'],
  'type' => $post['type']
           ];
     // Eğer posts array içerisindeki geçerli dizi değeri içerisinde $title değeri yoksa,
        if(!isset($post['title'])){ 
             $post['title'] = "Added Title"; // mevcut post dizisine "title" değeri ekle
        }
         // Eğer posts array içerisindeki geçerli dizi değeri içerisinde $type değeri yoksa,
        if(!isset($post['type'])){ 
             $post['type'] = "warning"; // mevcut post dizisine "type" değeri ekle
        }


    // Eğer posts arrayi içerisindeki geçerli dizi değeri içerisinde : $id değeri tanımlı değilse; 
    if($post['type'] == "urgent") 
      { 
           echo "<div style = 'background-color:red' >"; // $post dizisinde "type" değerine göre; arkaplan rengi almalıdır
       }
    elseif($post['type'] == "warning") 
    { 
           echo "<div style = 'background-color:yellow' >"; //$post dizisinde "type" değerine göre; arkaplan rengi alma
    } 
    else {
           echo "<div>";
    }
     // getPostDetails` fonksiyonu tetiklenerek ilgili içeriğin çıktısı gösterilmesi
    getPostDetails($id, $post['title']);
           echo "</div>";

}
?>
