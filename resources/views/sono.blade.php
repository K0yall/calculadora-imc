<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Qualidade do Sono</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sleep-container">
        <!-- Header Section -->
        <div class="sleep-header">
            <h1><i class="fas fa-moon-stars"></i> Análise do Sono</h1>
            <p>Descubra se seu descanso está adequado</p>
        </div>

        <!-- Sleep Form -->
        <form action="{{ route('calcular.sono') }}" method="POST" class="sleep-form">
            @csrf
            <div class="input-group">
                <label for="horasSono"><i class="fas fa-bed"></i> Horas de Sono</label>
                <div class="slider-container">
                    <input type="range" id="horasSono" name="horasSono" 
                        min="0" max="12" step="0.5" value="7"
                        oninput="updateValue(this.value)">
                    <div class="slider-labels">
                        <span>0h</span>
                        <span>12h</span>
                    </div>
                </div>
                <div class="value-display">
                    <span id="hoursValue">7</span> horas
                </div>
            </div>

            <button type="submit" class="analyze-btn">
                Analisar Sono
                <i class="fas fa-chart-line"></i>
            </button>
        </form>

        <!-- Result Section -->
        @if(isset($avaliacao))
        <div class="sleep-result animated-entry">
            <div class="result-header">
                <h2>Diagnóstico do Sono</h2>
                <div class="sleep-icon">
                    @if($avaliacaoNivel == 'ideal')
                    <i class="fas fa-smile-beam"></i>
                    @elseif($avaliacaoNivel == 'medio')
                    <i class="fas fa-meh"></i>
                    @else
                    <i class="fas fa-tired"></i>
                    @endif
                </div>
            </div>
            
            <div class="result-content">
                <p class="evaluation {{ $avaliacaoNivel }}">{{ $avaliacao }}</p>
                
                <!-- Sleep Quality Meter -->
                <div class="quality-meter">
                    <div class="quality-progress" style="width: {{ $progress }}%"></div>
                    <div class="quality-labels">
                        <span>Insuficiente</span>
                        <span>Regular</span>
                        <span>Ideal</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Sleep Tips -->
        <div class="sleep-tips">
            <h3><i class="fas fa-spa"></i> Dicas para Melhorar o Sono:</h3>
            <div class="tips-grid">
                <div class="tip-card">
                    <i class="fas fa-moon"></i>
                    <p>Mantenha horários regulares</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-mobile-alt"></i>
                    <p>Evite telas antes de dormir</p>
                </div>
                <div class="tip-card">
                    <i class="fas fa-temperature-low"></i>
                    <p>Ambiente fresco e escuro</p>
                </div>
            </div>
        </div>

        <a href="/" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Voltar ao Dashboard
        </a>
    </div>

    <script>
        function updateValue(val) {
            document.getElementById('hoursValue').textContent = val;
        }
    </script>
</body>
</html>
