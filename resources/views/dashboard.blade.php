<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health & Wellness Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Header Section -->
        <div class="dashboard-header">
            <h1 class="greeting">Bem-vindo, <span class="username">Usuário</span>!</h1>
            <p class="subtitle">Seu hub completo para saúde e bem-estar</p>
        </div>

        <!-- Stats Cards Grid -->
        <div class="grid-container">
            <!-- IMC Card -->
            <a href="{{ route('imc') }}" class="dashboard-card">
                <div class="card-icon imc">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3>Calculadora IMC</h3>
                <p>Descubra seu Índice de Massa Corporal</p>
                <span class="card-hover"></span>
            </a>

            <!-- Sono Card -->
            <a href="{{ route('sono') }}" class="dashboard-card">
                <div class="card-icon sono">
                    <i class="fas fa-moon-stars"></i>
                </div>
                <h3>Análise de Sono</h3>
                <p>Melhore sua qualidade de descanso</p>
                <span class="card-hover"></span>
            </a>

            <!-- Viagem Card -->
            <a href="{{ route('viagem') }}" class="dashboard-card">
                <div class="card-icon viagem">
                    <i class="fas fa-route"></i>
                </div>
                <h3>Planejador de Viagem</h3>
                <p>Calcule rotas e consumo</p>
                <span class="card-hover"></span>
            </a>
        </div>

        <!-- Daily Tip Section -->
        <div class="daily-tip">
            <i class="fas fa-lightbulb"></i>
            <p>Dica do dia: Mantenha-se hidratado durante as atividades físicas!</p>
        </div>
    </div>
</body>
</html>
