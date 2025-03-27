<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="health-container">
        <!-- Header Section -->
        <header class="calculator-header">
            <h1><i class="fas fa-weight"></i> Calculadora de IMC</h1>
            <p>Descubra seu Índice de Massa Corporal</p>
        </header>

        <!-- Calculator Form -->
        <form action="{{ route('calcular.imc') }}" method="POST" class="imc-form">
            @csrf
            <div class="input-group">
                <label for="peso"><i class="fas fa-weight-hanging"></i> Peso (kg)</label>
                <input type="number" id="peso" name="peso" step="0.1" required placeholder="Ex: 75.5" min="20" max="300">
            </div>

            <div class="input-group">
                <label for="altura"><i class="fas fa-ruler-vertical"></i> Altura (m)</label>
                <input type="number" id="altura" name="altura" step="0.01" required placeholder="Ex: 1.75" min="1.00" max="2.50">
            </div>

            <div class="input-group">
                <label for="idade"><i class="fas fa-user"></i> Idade</label>
                <input type="number" id="idade" name="idade" required placeholder="Ex: 25" min="1" max="120">
            </div>

            <button type="submit" class="calculate-btn">
                Calcular IMC <i class="fas fa-arrow-right"></i>
            </button>
        </form>

        <!-- Result Section -->
        @if(isset($imc))
        <div class="result-container">
            <h2>Seu Resultado: <span class="bmi-value">{{ number_format($imc, 2) }}</span></h2>
            <p><strong>Idade:</strong> {{ $idade }} anos</p>

            <div class="bmi-scale">
                <div class="scale-progress" 
                     style="width: {{ $progress }}%;" 
                     class="{{ $imc < 18.5 ? 'underweight' : ($imc < 24.9 ? 'normal' : ($imc < 29.9 ? 'overweight' : 'obese')) }}">
                </div>
                <div class="scale-labels">
                    <span>Abaixo</span><span>Normal</span><span>Sobrepeso</span><span>Obesidade</span>
                </div>
            </div>

            <div class="result-message">
                <i class="fas fa-comment-medical"></i>
                <p>{{ $interpretation }}</p>
            </div>
        </div>
        @endif

        <!-- Health Tips -->
        <div class="health-tips">
            <h3><i class="fas fa-lightbulb"></i> Dicas Saudáveis:</h3>
            <ul>
                <li>Dieta balanceada</li>
                <li>Exercícios regulares</li>
                <li>Durma 7-8 horas por noite</li>
            </ul>
        </div>

        <a href="/" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar ao Dashboard</a>
    </div>
</body>
</html>
