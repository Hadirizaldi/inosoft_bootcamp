<?php

// function luas lingkaran
function luasLingkaran (float $r) {
  $pi = 3.14;
  $luasLingkaran = $pi * pow($r, 2);
  return number_format($luasLingkaran, 2);
}

// function kelilingLingkaran 
function kelilingLingkaran (float $r) {
  $pi = 3.14;
  $kelilingLingkaran = $pi * 2 * $r;
  return number_format($kelilingLingkaran, 2);
}

// function luasPersegi
function luasPersegi (float $panjang, float $lebar){
  return number_format($panjang * $lebar, 2);
}

// app
for ($i = 1 ; $i<=100 ; $i++) {
  if ($i % 3 == 0 && $i %5 == 0) {
    $hasilPersegi = luasPersegi($i / 3, $i / 5 );
    echo "Luas Persegi : {$hasilPersegi}\n";
  }
  elseif ($i % 3 == 0) {
    $luasLingkaran = luasLingkaran($i / 3);
    echo "Luas Lingkaran : {$luasLingkaran}\n";
  } 
  elseif ($i % 5 == 0) {
    $kelilingLingkaran = kelilingLingkaran($i / 5);
    echo "Keliling Lingkaran : {$kelilingLingkaran}\n";
  } 
  else {
    $formatNum = number_format($i, 2);
    echo "{$formatNum}\n";
  }
}

