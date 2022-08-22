<?php
require_once("app/config/config.php");
require_once("app/core/Database.php");
$db = new Database();
$db->quickQuery("CREATE DATABASE IF NOT EXISTS quizcuy");
$db->quickQuery("USE quizcuy");

//tabel yang berdiri sendiri
$db->quickQuery("CREATE TABLE user (
    user_id int not null primary key auto_increment,
    nama varchar(80) not null,
    password varchar(200) not null,
    email varchar(200) not null,
    no_telpon varchar(50) not null,
    jumlah_nyawa int not null default 10,
    jumlah_koin int not null default 5,
    nama_posisi enum('admin','pemain') not null default 'pemain',
    dibuat_saat timestamp not null default now()
)");

$db->quickQuery("CREATE TABLE level (
    level_id int not null primary key auto_increment,
    nama_level int not null,
    jumlah_koin_didapatkan int not null default 3,
    dibuat_saat timestamp not null default now()
)");

$db->quickQuery("CREATE TABLE kategori_quiz (
    kategori_quiz_id int not null primary key auto_increment,
    nama_kategori varchar(80) not null,
    link_foto_kategori varchar(255) default null,
    dibuat_saat timestamp not null default now()
)");

//tabel top up nyawa
$db->quickQuery("CREATE TABLE cash_nyawa (
    cash_nyawa_id int not null primary key auto_increment,
    nama_top_up varchar(80) not null,
    jumlah_nyawa_dipulihkan int not null,
    jumlah_cash_dibayar int not null,
    dibuat_saat timestamp not null default now()
)");

$db->quickQuery("CREATE TABLE koin_nyawa (
    koin_nyawa_id int not null primary key auto_increment,
    jumlah_nyawa_dipulihkan int not null,
    jumlah_koin_dibayar int not null,
    dibuat_saat timestamp not null default now()
)");

//tabel yang membutuhkan tabel lainnya untuk berdiri
$db->quickQuery("CREATE TABLE quiz (
    quiz_id int not null primary key auto_increment,
    fk_kategori_quiz_id int not null,
    fk_level_id int not null,
    link_foto_soal varchar(255) default null,
    soal text not null,
    opsi_a varchar(255) not null,
    opsi_b varchar(255) not null,
    opsi_c varchar(255) not null,
    opsi_d varchar(255) not null,
    jawaban_benar char(1) not null,
    dibuat_saat timestamp not null default now(),

    FOREIGN KEY (fk_kategori_quiz_id) REFERENCES kategori_quiz (kategori_quiz_id),
    FOREIGN KEY (fk_level_id) REFERENCES level (level_id)
)");

//tabel perantara
$db->quickQuery("CREATE TABLE jawaban_pilihan_user (
    jawaban_pilihan_user_id int not null primary key auto_increment,
    fk_user_id int not null,
    fk_quiz_id int not null,
    pilihan char(1) not null,
    dibuat_saat timestamp not null default now(),

    FOREIGN KEY (fk_quiz_id) REFERENCES quiz (quiz_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_user_id) REFERENCES user (user_id) ON DELETE CASCADE
)");


$db->quickQuery("CREATE TABLE user_level_kategori (
    user_level_id int not null primary key auto_increment,
    fk_user_id int not null,
    fk_level_id int not null default 1,
    fk_kategori_quiz_id int not null,
    dibuat_saat timestamp not null default now(),

    FOREIGN KEY (fk_user_id) REFERENCES user (user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_level_id) REFERENCES level (level_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_kategori_quiz_id) REFERENCES kategori_quiz (kategori_quiz_id)
)");

$db->quickQuery("CREATE TABLE user_cash_nyawa (
    user_cash_nyawa_id int not null primary key auto_increment,
    fk_user_id int not null,
    fk_cash_nyawa_id int not null,
    dibuat_saat timestamp not null default now(),

    FOREIGN KEY (fk_user_id) REFERENCES user (user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_cash_nyawa_id) REFERENCES cash_nyawa (cash_nyawa_id) ON DELETE CASCADE 
)");

$db->quickQuery("CREATE TABLE user_koin_nyawa (
    user_koin_nyawa_id int not null primary key auto_increment,
    fk_user_id int not null,
    fk_koin_nyawa_id int not null,
    dibuat_saat timestamp not null default now(),

    FOREIGN KEY (fk_user_id) REFERENCES user (user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_koin_nyawa_id) REFERENCES koin_nyawa (koin_nyawa_id) ON DELETE CASCADE 
)");

echo "Berhasil Membuat Table!" . PHP_EOL;
