<?php

require_once("app/config/config.php");
require_once("app/core/Database.php");

$db = new Database();

$db->quickQuery("USE quizcuy");

try {

    $db->quickQuery("INSERT INTO user (nama, email, password, no_telpon, nama_posisi) VALUES 
        ('superadmin','superadmin@gmail.com','12345678','0898892211','admin')
    ");
    
    $db->quickQuery("INSERT INTO user (nama, email, password, no_telpon) VALUES 
        ('konen','addykonen80@gmail.com','12345678','0898892211'),
        ('dedy','Omekdedy@gmail.com','12345678','0878821117812'),
        ('palguna','palguna1121@gmail.com','12345678','0815527723941'),
        ('master sukiawan','mastersukiawan@gmail.com','hipertensi','088812311222'),
        ('pras_gaming','pras@module.com','prass12','0912288002'),
        ('john','johncena@gmail.com','john22','122448821122'),
        ('anna','anna@gmail.com','anna22','729911122888')
    ");
    
    $db->quickQuery("INSERT INTO level (nama_level) VALUES 
        (1),(2),(3),(4),(5),(6),(7),(8),(9),(10)
    ");
    
    $db->quickQuery("INSERT INTO kategori_quiz (nama_kategori) VALUES 
        ('ipa'),('matematika'),('english'),('teka-teki')
    ");
    
    $db->quickQuery("INSERT INTO cash_nyawa (jumlah_nyawa_dipulihkan, jumlah_cash_dibayar) VALUES 
        (5, 15000),(10,29000),(15,42000),(30, 70000), (50, 100000)
    ");
    
    $db->quickQuery("INSERT INTO koin_nyawa (jumlah_nyawa_dipulihkan, jumlah_koin_dibayar) VALUES 
        (1,2),(3, 5),(10, 18),(20,30),(50, 60)
    ");
    
    $db->quickQuery("INSERT INTO quiz (fk_kategori_quiz_id, fk_level_id, soal, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar) VALUES       
        (1,1,'apa singkatan dari SDA?','sumber dari alam','sumber daya alam','senang dapat ah ah ah ah','si durhaka','b'),
        (1,1,'kenapa kita butuh tidur?','untuk menambah tenaga','karena kita memerlukan itu','karena di doktrin tuhan','tuhan turu','a'),
        (1,1,'ciri hewan mamalia adalah?','mama nya dari anak yang bernama lia','hewan memakan rumput', 'hewan mempunyai daun telinga','hewan yang berdarah dingin','c'),
        (1,2,'apa singkatan dari PLN?','Pembangkit Listrik Tenaga Nuklir','Pembangkit Listrik Tenaga Narapidana','Pembangkit Laut Tenaga Nuklir','Pembangkit Laut Tenaga Ndak Tau','b'),
        (1,2,'kenapa tidur?','untuk menambah tenaga','karena kita memerlukan itu','karena di doktrin tuhan','tuhan turu','a'),
        (1,2,'ciri hewan reptil adalah?','mama nya dari anak yang bernama lia','hewan memakan rumput', 'hewan mempunyai daun telinga','hewan yang berdarah dingin','c'),
        (1,3,'apa yang dimaksud dengan turu?','tidur','bermain game','tidak tahu','apa aja bisa','a'),
        (1,3,'apa itu makan','sebuah kegiatan mengunyah','tidur','ya gak tahu','mengisi perut','a'),
        (1,3,'apa itu PLTA?', 'pembangkit listrik tenaga alfa','pembangkit listrik tenaga air','pembangkit listrik tanpa air','pembangkit listrik tenaga api','b'),
        (1,4,'apa itu m dalam fisika?','mana saya tahu','massa','kekuatan','kecepatan','a'),
        (1,4,'cara merubah dari suhu celcius ke reamur adalah?','4 / 5 x suhu C','5 / 4 x suhu C','tolol','9 / 5 x suhu C','a'),
        (1,4, 'apa itu karnivora?','hewan pemakan daging','hewan pemakan tumbuhan','hewan pemakan segala','gak bisa makan', 'a'),
        (2,1, '1 + 1 = ?','2','1','3','11','a'),
        (2,1, '1 + 4 = ?','4','5','6','1','b'),
        (2,1, '5 x 1 = ?','0','1','10','5','c'),
        (2,2, '1 + 1 x 2 = ?','3','2','4','1','a'),
        (2,2, '4 - 2 x 2 = ?','4','0','1','8','a'),
        (2,2,'3 x 3 - 3 = ?', '6','0','1','2','a'),
        (2,3,'(4 + 7) x 2 = ?', '22','11','18','0','a'),
        (2,3, '( 4 - 4 ) x 8 = ? ','1','0','28','24','b'),
        (2,3,'( 8 x 2 ) - 8 = ?','22','-48','8','-8', 'c')
    ");
    
    $db->quickQuery("INSERT INTO jawaban_pilihan_user (fk_user_id, fk_quiz_id, pilihan) VALUES
        (2,1,'b'),
        (2,6,'c'),
        (2,7,'a'),
        (2,12,'a'),
        (2,10,'a'),
        (2,13,'a'),
        (2,16,'c'),
        (3,1,'c'),
        (3,1,'b'),
        (3,6,'c'),
        (3,8,'c'),
        (3,6,'a'),
        (3,12,'a')
    ");
    
    $db->quickQuery("INSERT INTO user_level_kategori (fk_user_id, fk_level_id, fk_kategori_quiz_id) VALUES  
        (1,1,1),
        (1,1,2),
        (1,1,3),
        (1,1,4),
        (2,4,1),
        (2,3,2),
        (2,1,3),
        (2,1,4),
        (3,4,1),
        (3,1,2),
        (3,1,3),
        (3,1,4) 
    ");
    
    $db->quickQuery("INSERT INTO user_koin_nyawa (fk_user_id, fk_koin_nyawa_id) VALUES 
        (2,1),
        (2,2),
        (2,3),
        (3,1)
    ");
    
    $db->quickQuery("INSERT INTO user_cash_nyawa (fk_user_id, fk_cash_nyawa_id) VALUES 
        (3,1),
        (3,3),
        (3,4),
        (2,1)
    ");
} 
catch(Exception $e)
{
    echo $e->getMessage() . PHP_EOL;
    var_dump($e->getTrace());
    require_once("rollback.php");
    require_once('run.php');
    die;
}


echo "berhasil meanmbahkan data!";