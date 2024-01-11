<?php

// interface bangun datar
interface BangunDatar
{
  public function area();
  public function circumference();
  public function enlarge($scale);
  public function shrink($scale);
}

// class lingkaran
class Lingkaran implements BangunDatar
{
  private $jariJari;

  public function __construct($jariJari)
  {
    $this->jariJari = $jariJari;
  }

  public function area()
  {
    $luas = pi() * pow($this->jariJari, 2);
    return number_format($luas, 2);
  }

  public function circumference()
  {
    $keliling = pi() * 2 * $this->jariJari;
    return number_format($keliling, 2);
  }

  public function enlarge($scale)
  {
    $jariJariEnlarge = $this->jariJari * $scale;
    return new Lingkaran($jariJariEnlarge);
  }

  public function shrink($scale)
  {
    $jariJariShrink = $this->jariJari / $scale;
    return new Lingkaran($jariJariShrink);
  }
}

// class persegi
class Persegi implements BangunDatar
{
  private $sisi;

  public function __construct($sisi)
  {
    $this->sisi = $sisi;
  }

  public function getSisi()
  {
    return $this->sisi;
  }

  public function area()
  {
    return pow($this->sisi, 2);
  }

  public function circumference()
  {
    return (4 * $this->sisi);
  }

  public function enlarge($scale)
  {
    $sisiScale = $this->sisi * $scale;
    return new Persegi($sisiScale);
  }

  public function shrink($scale)
  {
    $sisiScale = $this->sisi / $scale;
    return new Persegi($sisiScale);
  }
}

// class Persegi Panjang
class PersegiPanjang implements BangunDatar
{
  private $panjang, $lebar;

  public function __construct($panjang, $lebar)
  {
    $this->panjang = $panjang;
    $this->lebar = $lebar;
  }

  public function area()
  {
    return $this->panjang * $this->lebar;
  }

  public function circumference()
  {
    return 2 * ($this->panjang + $this->lebar);
  }

  public function enlarge($scale)
  {
    $panjangEnlarge = $this->panjang * $scale;
    $lebarEnlarge = $this->lebar * $scale;
    return new PersegiPanjang(panjang: $panjangEnlarge, lebar: $lebarEnlarge);
  }

  public function shrink($scale)
  {
    $panjangShrink = $this->panjang / $scale;
    $lebarShrink = $this->lebar / $scale;
    return new PersegiPanjang(panjang: $panjangShrink, lebar: $lebarShrink);
  }
}

// class descriptor
class Descriptor
{
  public static function describe(BangunDatar $bangunDatar)
  {
    $jenisBangun = get_class($bangunDatar);
    $luas = $bangunDatar->area();
    $keliling = $bangunDatar->circumference();

    echo "Bangun datar ini adalah $jenisBangun yang memiliki luas $luas dan keliling $keliling\n";
  }
}

// testing app

// =================== bangun datar Default =================== //
$lingkaran = new Lingkaran(jariJari: 14);
$persegi = new Persegi(sisi: 10);
$persegiPanjang = new PersegiPanjang(panjang: 12, lebar: 8);

echo "================================== Bangun Datar Default ==================================\n";
echo "==========================================================================================\n";
Descriptor::describe($lingkaran);
Descriptor::describe($persegi);
Descriptor::describe($persegiPanjang);

// =================== bangun datar enlarge =================== //
$lingkaranEnlarge = $lingkaran->enlarge(5);
$persegiEnlarge = $persegi->enlarge(5);
$persegiPanjangEnlarge = $persegiPanjang->enlarge(5);

echo "\n================================== Bangun Datar Enlarge ==================================\n";
echo "==========================================================================================\n";
Descriptor::describe($lingkaranEnlarge);
Descriptor::describe($persegiEnlarge);
Descriptor::describe($persegiPanjangEnlarge);

// =================== bangun datar shrink =================== //
$lingkaranShrink = $lingkaran->shrink(2);
$persegiShrink = $persegi->shrink(2);
$persegiPanjangShrink = $persegiPanjang->shrink(2);

echo "\n================================== Bangun Datar Shrink ==================================\n";
echo "==========================================================================================\n";
Descriptor::describe($lingkaranShrink);
Descriptor::describe($persegiShrink);
Descriptor::describe($persegiPanjangShrink);
