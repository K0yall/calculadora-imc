<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planejador de Viagem</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body data-theme="green">
    <div class="glass-container">
        <!-- Header Section -->
        <div class="section-header">
            <h1><i class="fas fa-route"></i> Planejador de Viagem</h1>
            <p>Calcule o custo total do seu percurso</p>
        </div>

        <!-- Calculator Form -->
        <form action="{{ route('calcular.viagem') }}" method="POST" class="travel-form">
            @csrf
            <div class="input-group">
                <label for="distancia"><i class="fas fa-road"></i> Distância (km)</label>
                <div class="input-wrapper">
                    <input type="number" id="distancia" name="distancia" required 
                           placeholder="Ex: 350" min="1" max="10000">
                    <span class="input-unit">km</span>
                </div>
            </div>

            <div class="input-group">
                <label for="consumo"><i class="fas fa-gas-pump"></i> Consumo (km/l)</label>
                <div class="input-wrapper">
                    <input type="number" id="consumo" name="consumo" required 
                           placeholder="Ex: 12" min="1" max="50" step="0.1">
                    <span class="input-unit">km/l</span>
                </div>
            </div>

            <div class="input-group">
                <label for="preco"><i class="fas fa-dollar-sign"></i> Preço do Combustível</label>
                <div class="input-wrapper">
                    <input type="number" id="preco" name="preco" step="0.01" required 
                           placeholder="Ex: 5.75" min="1" max="20">
                    <span class="input-unit">R$</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Calcular Custo
                <i class="fas fa-calculator"></i>
            </button>
        </form>

        <!-- Result Section -->
        @if(isset($custo))
        <div class="travel-result animated-entry">
            <div class="result-header">
                <h2><i class="fas fa-receipt"></i> Custo da Viagem</h2>
                <div class="total-cost">
                    R$ {{ number_format($custo, 2, ',', '.') }}
                </div>
            </div>
            
            <div class="cost-details">
                <div class="detail-item">
                    <span>Distância:</span>
                    <span>{{ $distancia }} km</span>
                </div>
                <div class="detail-item">
                    <span>Consumo:</span>
                    <span>{{ $consumo }} km/l</span>
                </div>
                <div class="detail-item">
                    <span>Preço/Litro:</span>
                    <span>R$ {{ number_format($preco, 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
        @endif

        <!-- Fuel Tips -->
        <div class="travel-tips">
            <h3><i class="fas fa-lightbulb"></i> Dicas para Economizar:</h3>
            <div class="tips-grid">
                <div class="tip-card">
                    <i class="fas fa-tachometer-alt"></i>
                    <p>Mantenha velocidade constante</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-tire"></i>
                    <p>Verifique a calibragem dos pneus</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-route"></i>
                    <p>Planeje rotas mais eficientes</p>
                </div>
            </div>
        </div>

        <a href="/" class="btn back-btn">
            <i class="fas fa-arrow-left"></i>
            Voltar ao Dashboard
        </a>
    </div>
</body>
</html>
