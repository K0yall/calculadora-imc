<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IMC;
use App\Models\Sono;
use App\Models\Viagem;

class CalculoController extends Controller
{
    public function calcularIMC()
    {
        return view('imc');
    }

    public function avaliarSono()
    {
        return view('sono');
    }

    public function calculoGastoViagem()
    {
        return view('viagem');
    }

    public function processarIMC(Request $request)
    {
        $peso = $request->input('peso');
        $altura = $request->input('altura');
        $imc = $peso / ($altura * $altura);

        IMC::create(['peso' => $peso, 'altura' => $altura, 'imc' => $imc]);

        return view('imc', compact('imc'));
    }

    public function processarSono(Request $request)
{
    $horasSono = $request->input('horasSono');
    
    // Lógica para determinar o diagnóstico do sono
    if ($horasSono >= 7) {
        $avaliacao = "Sono adequado";
        $avaliacaoNivel = 'ideal'; // Nível 'ideal' se 7 horas ou mais
        $progress = 100;
    } elseif ($horasSono >= 5) {
        $avaliacao = "Sono insuficiente, mas aceitável";
        $avaliacaoNivel = 'medio'; // Nível 'medio' entre 5 e 7 horas
        $progress = 60;
    } else {
        $avaliacao = "Sono insuficiente";
        $avaliacaoNivel = 'ruim'; // Nível 'ruim' se menos de 5 horas
        $progress = 30;
    }

    // Criar um registro de sono no banco de dados
    Sono::create(['horas_sono' => $horasSono, 'avaliacao' => $avaliacao]);

    // Passar as variáveis para a view
    return view('sono', compact('avaliacao', 'avaliacaoNivel', 'progress'));
}


    public function processarViagem(Request $request)
    {
        $distancia = $request->input('distancia');
        $consumo = $request->input('consumo');
        $preco = $request->input('preco');
        $custo = ($distancia / $consumo) * $preco;

        Viagem::create(['distancia' => $distancia, 'consumo' => $consumo, 'preco' => $preco, 'custo' => $custo]);

        return view('viagem', compact('custo'));
    }
}
