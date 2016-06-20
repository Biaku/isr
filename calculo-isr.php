<?php
$bg = $_POST['baseGrabable'];

function calcularSubsidio($bg)
{
    $subsidio = 0.00;
    if($bg>=0.01 && $bg<=872.85)
    {
        $subsidio = 200.85;
    }
    elseif($bg>=872.86 && $bg<=1309.20)
    {
        $subsidio = 200.70;
    }
    elseif($bg>=1309.21 && $bg<=1713.60)
    {
        $subsidio = 200.70;
    }
    elseif($bg>=1713.61 && $bg<=1745.70)
    {
        $subsidio = 193.80;
    }
    elseif($bg>=1745.71 && $bg<=2193.75)
    {
        $subsidio = 188.70;
    }
    elseif($bg>=2193.76 && $bg<=2327.55)
    {
        $subsidio = 174.75;
    }
    elseif($bg>=2327.56 && $bg<=2632.65)
    {
        $subsidio = 160.35;
    }
    elseif($bg>=2632.66 && $bg<=3071.40)
    {
        $subsidio = 145.35;
    }
    elseif($bg>=3071.41 && $bg<=3510.15)
    {
        $subsidio = 125.10;
    }
    elseif($bg>=3510.16 && $bg<=3642.60)
    {
        $subsidio = 107.40;
    }
    elseif($bg>3642.61)
    {
        $subsidio = 0.00;
    }
    return $subsidio;
}
function calcularISR($bg)
{
    $total = 0;
    if($bg>=0.01 && $bg<=244.80)
    {
        $isr = ($bg - 0.01)*0.192+0.00;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=244.81 && $bg<=2077.50)
    {
        $isr = ($bg - 244.81)*0.0640+4.65;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=2077.51 && $bg<=3651.00)
    {
        $isr = ($bg - 2077.51)*0.1088+121.95;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=3651.01 && $bg<=4244.10)
    {
        $isr = ($bg - 3651.01)*0.16+293.25;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=4244.11 && $bg<=5081.40)
    {
        $isr = ($bg - 4244.11)*0.1792+388.05;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=5081.41 && $bg<=10248.45)
    {
        $isr = ($bg - 5081.41)*0.2136+538.20;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=10248.46 && $bg<=16153.05)
    {
        $isr = ($bg - 10248.46)*0.2352+1641.75;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=16153.06 && $bg<=30838)
    {
        $isr = ($bg - 16153.06)*0.30+3030.60;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=30838.81 && $bg<=41118.45)
    {
        $isr = ($bg - 30838.81)*0.32+7436.25;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>=41118.46 && $bg<=123355.20)
    {
        $isr = ($bg - 41118.46)*0.34+123355.20;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    elseif($bg>123355.21)
    {
        $isr = ($bg - 123355.21)*0.35+38686.35;
        $subsidio = calcularSubsidio($bg);
        $total = $isr-$subsidio;
    }
    return $total;
}

// si el subsidio es mayor que el isr, se le resta 

$resultado = calcularISR($bg);
if($resultado <0)
{
    echo "Subisido a favor de:".$resultado;
}
else
{
    echo "El ISR es de:".$resultado;
}
